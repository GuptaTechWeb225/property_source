<?php

namespace App\Http\Controllers\Backend;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Bill;
use App\Models\Payment;
use App\Models\Property\Property;
use App\Models\PropertyStatus;
use App\Models\Tenant;
use App\Services\TransactionService;
use App\Traits\CommonHelperTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BillController extends Controller
{
    use CommonHelperTrait;
    protected $transactionService;
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index(Request $request)
    {
        $authUser = Auth::user();
        $query = Bill::latest('id');
            if ($authUser->role_id == Role::LANDLORD){
                $query->whereHas('property', function ($query) use ($request){
                    $query->where('user_id', auth()->id());
                });
            }
            $query->when($request->input('property_id'), function ($query) use ($request) {
                $query->where('property_id', $request->input('property_id'));
            })->when($request->input('tenant_id'), function($query) use($request) {
                $query->where('tenant_id', $request->input('tenant_id'));
            })->when($request->input('month'), function ($query) use($request){
                $query->where('month', $request->input('month'));
            });

        $data['bills'] = $query->paginate($request->input('paginate',10));
        $data['title'] = _trans('common.Bills');
        $data['properties'] = Property::select('id','name')->get();
        $data['tenants'] = Tenant::select('id','name')->get();

        return view('backend.bill.index')->with($data);
    }

    public function create(Request $request)
    {
        $authUser = auth()->user();
        $data['bill'] = PropertyStatus::where('status','occupied')->where('is_active', 1)->where('id',$request->input('bill_for'))->first() ?? [];
        $query = PropertyStatus::where('status', 'occupied')
            ->where('is_active', 1);

        if ($authUser->role_id == Role::LANDLORD) {
            $query->whereHas('property', function ($query) use ($authUser) {
                $query->where('user_id', $authUser->id);
            });
        }

        $data['occupied_properties'] = $query->get();

        $data['title'] = _trans('common.Generate Bill');
        return view('backend.bill.create')->with($data);
    }


    public function store(Request $request)
    {
        $request->validate(['id' => 'required|exists:property_statuses', 'month' => 'required']);
        try{
            DB::beginTransaction();
            $occupied = PropertyStatus::where('status','occupied')->where('is_active', 1)->where('id',$request->input('id'))->first();
            $bill['property_id'] = $occupied->property_id;
            $bill['tenant_id'] = $occupied->tenant_id;
            $bill['due_date'] = date('Y-m-d',strtotime($occupied->orderDetail->end_date."-10 day"));
            $bill['month'] = $request->input('month');
            $bill['amount'] = $occupied->orderDetail->total_amount;
            $bill['payment_status'] = @$occupied->orderDetail->payment_status == 'partial' ? 'pending': @$occupied->orderDetail->payment_status;
            $bill['fine_amount'] = 0;
            $bill['total_amount'] = $occupied->orderDetail->total_amount;
            $bill['created_by'] = auth()->id();

            Bill::firstOrCreate([
                'property_id' => $bill['property_id'],
                'tenant_id' => $bill['tenant_id'],
                'month' => $bill['month']
            ],$bill);

            DB::commit();
            return redirect()->route('bill.index')->with('success', _trans('alert.Bill generated successfully!'));
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }

    public function generateAllBills()
    {
        try{
            DB::beginTransaction();
            $occupied_properties = PropertyStatus::with('advertisement','orderDetail','tenant')->where('status','occupied')->where('is_active', 1)->get();
            foreach ($occupied_properties as $occupied){
                $bill['property_id'] = $occupied->property_id;
                $bill['tenant_id'] = $occupied->tenant_id;
                $bill['due_date'] = date('Y-m-d',strtotime($occupied->orderDetail->end_date."-10 day"));
                $bill['month'] = date('Y-m');
                $bill['amount'] = $occupied->orderDetail->total_amount;
                $bill['payment_status'] = $occupied->orderDetail->payment_status;
                $bill['fine_amount'] = 0;
                $bill['total_amount'] = $occupied->orderDetail->total_amount;
                $bill['created_by'] = auth()->id();

                Bill::firstOrCreate([
                    'property_id' => $bill['property_id'],
                    'tenant_id' => $bill['tenant_id'],
                    'month' => $bill['month']
                ],$bill);
            }
            DB::commit();
            return redirect()->route('bill.index')->with('success', _trans('alert.Bill generated successfully!'));
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }

    public function show($id)
    {
        $data['title'] = _trans('common.Bill Invoice');
        $data['invoice'] = Bill::findOrFail($id);

        return view('backend.account.bill_invoice')->with($data);
    }

    public function collectBill($id)
    {
        $data['title'] = _trans('Collect Bill');
        $data['bill'] = Bill::find($id);
        $data['accounts'] = Account::where('user_id', $data['bill']->tenant->id)->get();
        return view('backend.bill.collect_bill')->with($data);
    }

    public function getBillAmount(Request $request)
    {
        $occupied = Bill::find($request->input('id'));
        $accounts = Account::where('user_id',$occupied->tenant_id)->get();
        return response()->json(['total_amount' => $occupied->amount],'accounts');
    }

    public function calculateFine(Request $request)
    {
        $bills = Bill::query()
                ->where('due_date', '<', date('Y-m-d'))
                ->where('month', date('Y-m'))
                ->get();

        foreach ($bills as $bill){
            $fineAmount = calculatePercentage('percent',setting('fine_percentage'),$bill->amount);
            $bill->fine_amount = $fineAmount;
            $bill->total_amount = $bill->amount + $fineAmount;
            $bill->save();
        }
        return response()->json('Calculated successfully!',200);
    }

    public function paymentpProcess(Request $request)
    {
        $request->validate([
            'account_id' => 'required',
            'total_amount' => 'required|numeric',
            'payment_amount' => [
                'required',
                'numeric',
                Rule::in([$request->input('total_amount')]), // Ensure payment_amount is equal to total_amount
            ],
        ],[
            'payment_amount.in' => _trans('common.The payment amount must be equal to the total amount'),
        ]);

        try {
            DB::beginTransaction();
            $bill  =  Bill::find($request->input('bill_id'));
            $owner_account_id = Account::where('user_id',$request->input('owner_id'))->first();
            if (empty($owner_account_id)){
                throw new \Exception('Landlord account not found');
            }
            $payment = $bill->payments()->create([
                'invoice_no' => uniqid(),
                'date' => Carbon::today(),
                'amount' => $request->payment_amount,
                'payment_method' => 'Cash Payment',
                'attachment_id' => $this->UploadImageCreate($request->attachment, 'assets/documents/') ?? null,
                'additional_info' => $request->input('additional_info'),
            ]);
            $bill->payment_status = 'paid';
            $bill->save();

            $this->transactionService->storeTransaction($request->input('account_id'),$payment, 'debit', $payment->invoice_no, $payment->payment_method, null, $payment->amount, $payment->attachment_id);
            $this->transactionService->storeTransaction($owner_account_id->id,$payment, 'credit', $payment->invoice_no, $payment->payment_method, null, $payment->amount, $payment->attachment_id);
            DB::commit();
            return redirect()->route('bill.index')->with('success',_trans('common.Bill successfully collected'));
        }catch (\Exception $exception){
            dd($exception);
            DB::rollBack();
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


}
