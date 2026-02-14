<?php


namespace App\Http\Controllers\Api\v1;


use App\Enums\Role;
use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Tenant;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\PropertyStatus;
use Illuminate\Validation\Rule;
use App\Models\Property\Property;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\TransactionService;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Api\v1\BillListResource;
use App\Http\Resources\Api\v1\BillDetailsResource;

class BillController extends Controller
{
    use ApiReturnFormatTrait;
    use CommonHelperTrait;
    protected $transactionService;
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }


    public function index(Request $request)
    {
        try {
            $bills = Bill::with('property', 'tenant')->latest('id')
                ->when($request->input('property_id'), function ($query) use ($request) {
                    $query->where('property_id', $request->input('property_id'));
                })->when($request->input('tenant_id'), function ($query) use ($request) {
                    $query->where('tenant_id', $request->input('tenant_id'));
                })->when($request->input('month'), function ($query) use ($request) {
                    $query->where('month', $request->input('month'));
                })->paginate($request->input(' ', 10));


            $responseData = new BillListResource($bills);
            return $this->successResponse('Bill List', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public function billDetails($id)
    {
        try{

            $data = PropertyStatus::with('orderDetail', 'tenant', 'property')->where('status', 'occupied')
            ->where('is_active', 1)
            ->where('id', $id)->first();
            if(empty($data)){
                throw new \Exception('occupied property not found', 404);
            }

            $bill = new BillDetailsResource($data);

            return $this->responseWithSuccess('Bill Details', $bill);
        }catch(\Exception $exception){
            return $this->responseExceptionError($exception->getMessage(),'', 500);
        }

    }


    public function generateBill(Request $request)
    {
        try {
            $occupied = PropertyStatus::where('status', 'occupied')->where('is_active', 1)->where('id', $request->input('bill_id'))->first();

            $bill['property_id'] = $occupied->property_id;
            $bill['tenant_id'] = $occupied->tenant_id;
            $bill['due_date'] = date('Y-m-d', strtotime($occupied->orderDetail->end_date . "-10 day"));
            $bill['month'] = $request->input('month');
            $bill['amount'] = $occupied->orderDetail->total_amount;
            $bill['payment_status'] = @$occupied->orderDetail->payment_status == 'partial' ? 'pending' : @$occupied->orderDetail->payment_status;
            $bill['fine_amount'] = 0;
            $bill['total_amount'] = $occupied->orderDetail->total_amount;
            $bill['created_by'] = auth()->id();

            Bill::firstOrCreate([
                'property_id' => $bill['property_id'],
                'tenant_id' => $bill['tenant_id'],
                'month' => $bill['month']
            ], $bill);

            return $this->successResponse('Bill generated Successfully', null, 201);
        } catch (\Exception $e) {
            return $this->responseExceptionError($e->getMessage(), null, $e->getCode() ?? 500);
        }
    }


    public function collectBill(Request $request)
    {
       $validate = Validator::make($request->all(),['bill_id' => 'required',
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

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors(),
            ], 422);
        }
        try {
            DB::beginTransaction();
            $bill  =  Bill::find($request->input('bill_id'));
            if (empty($bill)){
                return $this->responseWithError('Bill not found');
            }
            $owner_id  = @$bill->property->user->id;
            $owner_account_id = Account::where('user_id',$owner_id)->first();
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
            return $this->responseWithSuccess('Bill successfully collected','', 200);
        }catch (\Exception $exception){
            DB::rollBack();
            return $this->responseExceptionError($exception->getMessage(), null, 500);
        }
    }

    public function occupiedProperty()
    {
        $authUser = auth()->user();
        $query = PropertyStatus::where('status', 'occupied')
            ->where('is_active', 1);

        if ($authUser->role_id == Role::LANDLORD) {
            $query->whereHas('property', function ($query) use ($authUser) {
                $query->where('user_id', $authUser->id);
            });
        }

        $data = $query->get();

        $properties = $data->map(function ($data) {
            return [
                'id' => $data->id,
                'property_id' => @$data->property->id,
                'property_name' => @$data->property->name,
            ];
        });
        return $this->successResponse('Occupied Properties', $properties, 200);
    }
}
