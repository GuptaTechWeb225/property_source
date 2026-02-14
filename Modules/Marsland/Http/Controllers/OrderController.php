<?php

namespace Modules\Marsland\Http\Controllers;


use App\Interfaces\OrderInterface;
use App\Models\Account;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Property\Property;
use App\Services\NotificationService;
use App\Services\TransactionService;
use App\Traits\CommonHelperTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderController extends Controller
{
    use CommonHelperTrait;
    private $order;
    protected $transactionService;

    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
        $this->transactionService = new TransactionService;
    }

    public function orderList(Request $request)
    {
        $orders = Order::with(["orderDetails"])->where('tenant_id', Auth::user()->id)->paginate(25);

        return view('marsland::customer.order.order-list', [
            "orders" => $orders
        ]);
    }


    public function orderDetails($id)
    {
        $data['title'] = _trans('common.Order Detail');
        $data['order']    = Order::with('orderDetails', 'tenant')->findOrFail($id);
        // dd($data['order']);
        $data['accounts'] = Account::where('user_id', \auth()->id())->get();
        return view('marsland::customer.order.order_detail')->with($data);
    }

    public function orderInvoice($id)
    {
        $data['title'] = _trans('common.Order Invoice');
        $data['order'] = Order::findOrFail($id);
        return view('marsland::customer.order.invoice')->with($data);
    }


    public function calculatePayment(Request $request)
    {
        $orderDetails = OrderDetail::find($request->order_id);
        $pay_amount = $orderDetails->payments()->sum('amount');
        $totalAmount = $orderDetails->total_amount -  $pay_amount;
        return response()->json([
            'data' => $totalAmount,
        ], 200);

    }

    public function orderPayment(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $property = Property::findOrFail($request->property_id);
                $orderDetail = OrderDetail::find($request->order_detail_id);
                $landlord  = $orderDetail->property->user_id;
                $account = Account::where('user_id', $property->user_id)->where('is_default', 1)->first();

                if (empty($account)){
                    $account = Account::where('user_id', $landlord)->first();
                }
                if (empty($account)){
                    throw  new \Exception('Credit account not found');
                }

                $payment = $orderDetail->payments()->create([
                    'invoice_no' => uniqid(),
                    'date' => Carbon::today(),
                    'amount' => $request->payment_amount,
                    'payment_method' => 'Cash Payment',
                    'attachment_id' => $this->UploadImageCreate($request->image, 'assets/documents/') ?? null,
                ]);

                $total_pay = $orderDetail->total_amount - $orderDetail->payments->sum('amount');
                if ($total_pay > 0){
                    $orderDetail->payment_status = 'partial';
                }else{
                    $orderDetail->payment_status = 'paid';
                }

                $orderDetail->save();

                $this->transactionService->storeTransaction($request->input('account_id'),$payment, 'debit', $payment->invoice_no, $payment->payment_method, null, $payment->amount, $payment->attachment_id);
                $this->transactionService->storeTransaction($account->id,$payment, 'credit', $payment->invoice_no, $payment->payment_method, null, $payment->amount, $payment->attachment_id);
                NotificationService::notify(\auth()->id(),$property->user_id,'Pay ' . priceFormat($payment->amount) . " Amount",'Lorem ipsum dolor sit amet, consectetur adipisicing elit.');
            });
            return redirect()->back()->with('success', _trans('alert.payment_taken_successfully'));
        } catch (\Exception $exception){
            return redirect()->back()->with('danger', _trans($exception->getMessage()));
        }
    }
}
