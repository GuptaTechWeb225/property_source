<?php

namespace Modules\Marsland\Http\Controllers;

use App\Enums\DealType;
use App\Models\Advertisement;
use App\Models\BillingAddress;
use App\Models\Locations\Country;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Property\Property;
use App\Services\DuePaymentService;
use App\Services\NotificationService;
use App\Services\PropertyStatusService;
use App\Utils\Utils;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Marsland\Entities\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    protected $propertyStatus;
    protected $duePayment;
    protected $notification;

    public function __construct(PropertyStatusService $propertyStatusService, DuePaymentService $duePaymentService, NotificationService $notificationService)
    {
        $this->propertyStatus = $propertyStatusService;
        $this->duePayment = $duePaymentService;
        $this->notification = $notificationService;
    }

    public function ADDTOCART(Request $request)
    {
        $request->validate([
            'property_id' => 'required',
            'advertisement_id' => 'required',
        ]);

        try {
            $date = Carbon::now();
            if (!auth()->check()) {
                return redirect()->route('register');
            }
            $property = Property::findOrFail($request->input('property_id'));
            $advertisement = Advertisement::findOrFail($request->input('advertisement_id'));

            $data = [
                'property_id' => $property->id,
                'start_date' => now(),
                'type' => $advertisement->advertisement_type,
                'advertisement_id' => $advertisement->id,
                'discount_amount' => calculatePercentage($property['discount_type'], $property['discount_amount'], $property['amount']),
            ];

            if ($advertisement->advertisement_type == DealType::RENT) {
                $data['amount'] = $advertisement->rent_amount;
                $data['end_date'] = $advertisement->rent_end_date;
            }

            if ($advertisement->advertisement_type == DealType::SELL) {
                $data['amount'] = $advertisement->sell_amount;
                $data['end_date'] = null;
            }

            if ($advertisement->advertisement_type == DealType::MORTGAGE) {
                $data['amount'] = $advertisement->mortgage_amount;
                $data['durations'] = $advertisement->mortgage_duration;
                $data['end_date'] = $date->addDays($advertisement->mortgage_duration);
            }

            if ($advertisement->advertisement_type == DealType::LEASE) {
                $data['amount'] = $advertisement->lease_amount;
                $data['durations'] = $advertisement->lease_duration;
                $data['end_date'] = $date->addDays($advertisement->lease_duration);
            }

            if ($advertisement->advertisement_type == DealType::CARETAKER) {
                $data['amount'] = 0;
                $data['durations'] = $advertisement->caretaker_duration;
                $data['end_date'] = $date->addDays($advertisement->caretaker_duration);
            }

            $data['tenant_id'] = auth()->id();
            Cart::create($data);
            return redirect()->route('cart.cart_list')->with('success', _trans('alert.Successfully Added!'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


    public function removeFromCart($id)
    {
        try {
            $cart = Cart::findOrFail($id);
            $cart->delete();
            return true;
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }


    public function cartList()
    {
        $data['carts'] = Cart::with('user', 'property')->where('tenant_id', auth()->id())->get();
        return view('marsland::pages.cart')->with($data);
    }

    public function checkout()
    {
        $subtotal = 0;
        $total_discount = 0;
        $total = 0;
        $carts = Cart::with('user', 'property')->where('tenant_id', auth()->id())->get();
        foreach ($carts as $cart) {
            $discount_amount = calculatePercentage(@$cart->property->discount_type, @$cart->property->discount_amount, $cart->amount);
            $total_discount += $discount_amount;
            $subtotal += $cart->amount;
            $total += $cart->amount - $discount_amount;
        }
        $data['subtotal'] = $subtotal;
        $data['total_discount'] = $total_discount;
        $data['total'] = $total;
        $data['addresses'] = BillingAddress::where('user_id', auth()->id())->get();
        $data['carts'] = $carts;
        $data['countries'] = Country::select('id', 'name')->get();
        return view('marsland::pages.checkout')->with($data);
    }


    public function placeOrder(Request $request)
    {
        $this->validation($request);
        try {
            $carts = Cart::where('tenant_id', \auth()->id())->get();
            $tenant_id = \auth()->id();
            $grand_total = $request->input('grand_total');
            $order = new Order;
            $order->invoice_no = uniqid();
            $order->tenant_id = $tenant_id;
            $order->date = date('Y-m-d', time());
            $order->subtotal = $request->input('subtotal');
            $order->discount_amount = $request->input('discount_amount');
            $order->grand_total = $grand_total;
            $order->paid_amount = 0;
            $order->due_amount = $grand_total;
            $order->created_by = Auth::id();
            $order->updated_by = Auth::id();

            $order->save();

            foreach ($carts as $item) {
                $property = Property::find($item['property_id']);
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $order->id;
                $orderDetails->property_id = $item['property_id'];
                $orderDetails->advertisement_id = $item['advertisement_id'];
                $orderDetails->start_date = $item['start_date'];
                $orderDetails->end_date = $item['end_date'];
                $orderDetails->is_buy = $item['is_buy'];
                $orderDetails->price = $item['amount'];
                $orderDetails->discount_amount = $item['discount_amount'];
                $orderDetails->total_amount = $item['amount'] - $item['discount_amount'];
                $orderDetails->save();

                $this->duePayment->addDuePayment($orderDetails->property_id, $orderDetails, $tenant_id, $property->user_id, $orderDetails->total_amount, 0, $orderDetails->total_amount);
                $this->propertyStatus->updatePropertyStatus($orderDetails->property_id, $orderDetails, 'occupied', true, $order->tenant_id);
                NotificationService::notify($tenant_id, $property->user_id, 'New Order', \auth()->user()->name . ' make a order for ' . '<a target="_blank" class="text-decoration-underline text-primary" href="' . route('admin.properties.details', [$property->id, 'basicInfo']) . '">' . $property->name . '</a>');
            }

            if ($request->has('billing_address_id')) {
                $order->billing_address_id = $request->input('billing_address_id');
                $order->save();
            } else {
                $address = new BillingAddress();
                $address->name = $request->input('name');
                $address->user_id = \auth()->id();
                $address->phone = $request->input('phone');
                $address->email = $request->input('email');
                $address->address = $request->input('address');
                $address->country_id = $request->input('country_id');
                $address->terms_and_condition = $request->input('terms_and_condition');
                $address->save();

                $order->billing_address_id = $address->id;
                $order->save();
            }
            Cart::where('tenant_id', \auth()->id())->delete();

            DB::commit();

            if (@$request->payment_method == 'bank') {
                return redirect()->route('customer.order_detail', $order->id)->with('success', _trans('alert.Congratulations your order successful placed!'));
            }

            return redirect()->route('home')->with('success', _trans('alert.Congratulations your order successful placed!'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('danger', _trans('alert.Something went wrong!'));
        }
    }


    private function validation($request)
    {
        if ($request->has('billing_address_id')) {
            $rules = [
                'payment_method' => 'required',
                'terms_and_condition' => 'required',
                'billing_address_id' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'country_id' => 'required',
                'address' => 'required',
                'payment_method' => 'required',
                'terms_and_condition' => 'required',
            ];
        }
        return $request->validate($rules);
    }
}
