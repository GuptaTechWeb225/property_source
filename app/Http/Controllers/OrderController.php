<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\PaymentStoreRequest;
use App\Interfaces\OrderInterface;
use App\Models\Account;
use App\Models\Advertisement;
use App\Models\FamilyMember;
use App\Models\Order;
use App\Models\MasterOrder;
use App\Models\OrderDetail;
use App\Models\OrderPayment;
use App\Models\Payment;
use App\Models\Property\Property;
use App\Models\Property\Transaction;
use App\Models\Tenant;
use App\Models\User;
use App\Services\NotificationService;
use App\Services\TransactionService;
use App\Traits\CommonHelperTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\Order\OrderStoreRequest;
use mysql_xdevapi\Exception;
use PhpParser\Node\Stmt\DeclareDeclare;

class OrderController extends Controller
{

    use CommonHelperTrait;

    private $order;
    protected $transactionService;

    public function __construct(OrderInterface $order)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }

        $this->order = $order;
        $this->transactionService = new TransactionService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orders'] = order::latest()->get();

        $data['title'] = _trans('common.orders');

        return view('backend.orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentDate = Carbon::now();
        $newAdvertisementDate = $currentDate->copy()->addDays(15);
        $data['advertisements'] = Advertisement::with('property')
            ->whereDoesntHave('orders', function ($query) {
                $query->whereIn('status', ['pending', 'approved']);
            })
            ->get();
        $data['title'] = _trans('common.Create Order');
        return view('backend.orders.create')->with($data);
    }


    public function addToCart($id)
    {
        try {
            $cart = session()->get('order_cart', []);
            $advertisement = Advertisement::with('property')->findOrFail($id);

            if ($advertisement->advertisement_type == 1) {
                $start_date = $advertisement->rent_start_date;
                $end_date = $advertisement->rent_end_date;
            } else {
                $start_date = $advertisement->sell_start_date;
                $end_date = null;
            }

            if ($advertisement->advertisement_type == 1) {
                $price = $advertisement->rent_amount;
            } else {
                $price = $advertisement->sell_amount;
            }
            $discount_amount = calculatePercentage(@$advertisement->property->discount_type, @$advertisement->property->discount_amount, $price);
            $total_amount = $price - $discount_amount;

            if (isset($cart[$id])) {
                throw new \Exception(_trans('alert.Property already been taken!'));
            } else {
                $cart[$id] = [
                    'property' => $advertisement->property->name,
                    'property_id' => $advertisement->property->id,
                    'advertisement_id' => $id,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'is_buy' => $advertisement->rent_type ? 0 : 1,
                    'price' => $price,
                    'discount_amount' => $discount_amount,
                    'total_amount' => $total_amount,
                ];
            }
            session()->put('order_cart', $cart);
            return redirect()->route('orders.checkout')->with('success', _trans('alert.Property added successfully!'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }

    public function removeFromCart($id)
    {
        $carts = session()->get('order_cart', []);
        if (array_key_exists($id, $carts)) {
            // Remove the property from the cart
            unset($carts[$id]);
            // Update the cart in the session
            session()->put('order_cart', $carts);
            return redirect()->back()->with('success', _trans('alert.Property removed from the cart successfully.'));
        }

        return redirect()->route('landlord.propertyCart')->with('error', _trans('alert.Property not found in the cart!'));
    }


    public function checkout()
    {
        $data['tenants'] = Tenant::where('role_id', 5)->latest()->get(['id', 'name']);
        $data['carts'] = session()->get('order_cart', []);
        $data['title'] = _trans('common.Checkout');
        return view('backend.orders.checkout')->with($data);
    }


    public function store(OrderStoreRequest $request)
    {
        $result = $this->order->store($request);
        if ($result) {
            return redirect()->route('orders.index')->with('success', _trans('alert.Your order has been placed successfully.'));
        }
        return redirect()->route('tenants.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = _trans('common.Details');
        $data['order'] = Order::with('orderDetails', 'tenant')->findOrFail($id);
        $data['accounts'] = Account::where('user_id', $data['order']->tenant_id)->get();
        return view('backend.orders.show')->with($data);
    }

    public function invoice($id)
    {
        $data['title'] = _trans('common.Order Invoice');
        $data['order'] = Order::findOrFail($id);
        return view('backend.orders.invoice')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit($order_number)
    {
        $data['orders'] = masterOrder::where('order_number', $order_number)
            ->join('orders', 'master_orders.id', '=', 'orders.master_order_id')
            ->join('properties', 'orders.property_id', '=', 'properties.id')
            ->select('orders.*', 'master_orders.order_status', 'properties.rent_amount', 'master_orders.order_number')
            ->first();

        $data['properties'] = Property::all();

        $data['title'] = _trans('common.Edit');

        return view('backend.orders.edit', compact('data'));
    }

    public function fetch_property(Request $request)
    {
        $data['property'] = Property::find($request->property_id);
        if ($request->property_id == $request->invoice_property_id) {
            $data['orders'] = masterOrder::where('order_number', $request->order_number)
                ->join('orders', 'master_orders.id', '=', 'orders.master_order_id')
                ->join('properties', 'orders.property_id', '=', 'properties.id')
                ->select('orders.*', 'master_orders.order_status', 'properties.rent_amount', 'master_orders.order_number')
                ->first();
        }
        return response()->json([
            'data' => $data,
        ], 200);
    }

    public function calculate_payment(Request $request)
    {
        $orderDetails = OrderDetail::find($request->order_id);
        $pay_amount = $orderDetails->payments()->sum('amount');
        $totalAmount = $orderDetails->total_amount - $pay_amount;
        return response()->json([
            'data' => $totalAmount,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update_detail(Request $request)
    {
        $user  = Auth::user();
        $order = OrderDetail::with('property', 'order')->findOrFail($request->input('order_item_id'));
        if ($order) {
            $order->status = $request->input('status');
            $order->save();
            NotificationService::notify($user->id, @$order->order->tenant_id, 'Property ' . $order->status, @$order->property->name . ' has been ' . $order->status);
        }
        return redirect()->back()->with('success', _trans('alert.status_updated_successfully'));
    }


    public function update(Request $request)
    {

        try {

            DB::beginTransaction();
            $masterOrder = MasterOrder::where('order_number', $request->order_number)->first();
            if ($masterOrder) {
                $masterOrder->order_status = $request->status;
                $masterOrder->save();
            }
            $daterange = str_replace("- null", "", $request->daterange);

            $dateArray = explode(' - ', $daterange);
            if (array_key_exists(1, $dateArray)) {
                $end_date = $dateArray[1];
            } else {
                $end_date = null;
            }

            $Order = Order::where('master_order_id', $masterOrder->id)->first();

            if ($Order) {
                $Order->status = $request->status;
                $Order->discount_amount = $request->discount_amount;
                $Order->property_id = $request->property_id;
                $Order->start_date = $dateArray[0];
                $Order->end_date = $end_date;
                $Order->save();
            }

            DB::commit();
            return redirect()->back()->with('success', _trans('alert.status_updated_successfully'));
        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollBack();

            // Handle the exception or show an error message
            echo "Transaction failed. Error: " . $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        if (MasterOrder::destroy($id)) :
            $success[0] = "Deleted Successfully";
            $success[1] = "Success";
            $success[2] = "Deleted";
        else :
            $success[0] = "Something went wrong, please try again.";
            $success[1] = 'error';
            $success[2] = "oops";
        endif;
        return response()->json($success);
    }


    /**
     * payment info submit.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function payment(PaymentStoreRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $orderDetail = OrderDetail::find($request->order_detail_id);
                $payment = $orderDetail->payments()->create([
                    'invoice_no' => uniqid(),
                    'date' => Carbon::today(),
                    'amount' => $request->payment_amount,
                    'payment_method' => 'Cash Payment',
                    'attachment_id' => $this->UploadImageCreate($request->image, 'assets/documents/') ?? null,
                ]);

                $order  = Order::where('id', $orderDetail->id)->first();
                $landlord  = $orderDetail->property->user_id;

                $account = Account::where('user_id', $landlord)->where('is_default', 1)->first();

                if (empty($account)) {
                    $account = Account::where('user_id', $landlord)->first();
                }
                if (empty($account)) {
                    throw  new \Exception('Credit account not found');
                }

                $total_pay = $orderDetail->total_amount - $orderDetail->payments->sum('amount');

                if ($total_pay > 0) {
                    $orderDetail->payment_status = 'partial';
                } else {
                    $orderDetail->payment_status = 'paid';
                }

                $orderDetail->save();

                $this->transactionService->storeTransaction($request->input('account_id'), $payment, 'debit', $payment->invoice_no, $payment->payment_method, null, $payment->amount, $payment->attachment_id);
                $this->transactionService->storeTransaction($account->id, $payment, 'credit', $payment->invoice_no, $payment->payment_method, null, $payment->amount, $payment->attachment_id);
                NotificationService::notify(\auth()->id(), $order->tenant_id, 'Pay ' . priceFormat($payment->amount) . " Amount", 'Paid ' . priceFormat($payment->amount) . ' Amount for ' . @$orderDetail->property->name);
            });
            return redirect()->back()->with('success', _trans('alert.payment_taken_successfully'));
        } catch (\Exception $exception) {

            return redirect()->back()->with('danger', _trans($exception->getMessage()));
        }
    }


    public function familyMemberEligible($id)
    {
        try {
            $member = FamilyMember::findOrFail($id);
            $member->status = true;
            $member->save();
            $receiver = $member->tenant_id;
            $sender = \auth()->user();
            NotificationService::notify($sender->id, $receiver, "A Family Member Approved", "$member->name Approved by $sender->name");
            return redirect()->back()->with('success', _trans('alert.Succesfully updated'));
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', _trans('alert.Something went wrong'));
        }
    }
}
