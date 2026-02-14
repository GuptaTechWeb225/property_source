<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Image;
use App\Models\Order;
use App\Models\Rental;
use App\Models\Document;
use App\Models\Wishlist;
use App\Models\DuePayment;
use App\Models\BankAccount;
use App\Models\MasterOrder;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\BillingAddress;
use App\Models\EmergencyContact;
use App\Models\Locations\Country;
use App\Models\Property\Property;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\DB;

use App\Services\DuePaymentService;
use App\Http\Controllers\Controller;
use App\Models\Property\Transaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Property\PropertyTenant;
use App\Services\PropertyStatusService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;
use Illuminate\Console\View\Components\Alert;
use App\Http\Requests\Order\BillingAddressRequest;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CustomerController extends Controller
{
    use  CommonHelperTrait;

    protected $propertyStatus;
    protected $duePayment;

    public function __construct(PropertyStatusService $propertyStatusService, DuePaymentService $duePaymentService)
    {
        $this->middleware('customer.auth');
        $this->propertyStatus = $propertyStatusService;
        $this->duePayment = $duePaymentService;
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        Auth::logout();
        return redirect()->route('home');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['breadcrumb'] = ['Dashboard' => 'customer/dashboard'];
        $data['profile'] = auth()->guard('customer')->user();
        $data['order'] = Order::where('tenant_id', Auth::user()->id)->count();
        $data['coupon'] = Order::where('tenant_id', Auth::user()->id)->whereNotNull('coupon_code')->count();
        $data['totalAmount'] = Order::where('tenant_id', Auth::user()->id)->sum('grand_total');
        $data['complete_order'] = MasterOrder::where('tenant_id', Auth::user()->id)->where('payment_status', 'approved')->count();
        $data['cart'] = Cart::where('tenant_id', Auth::user()->id)->count();
        $data['wishlist'] = Wishlist::where('user_id', Auth::user()->id)->count();
        $data['order_history'] = MasterOrder::where('tenant_id', Auth::user()->id)->get();

        $data['statistics'] = [
            [
                'title' => 'Total Orders',
                'value' => 0,
            ],
            [
                'title' => 'Total Products',
                'value' => 0,
            ],
            [
                'title' => 'Total Reviews',
                'value' => 0,
            ],
            [
                'title' => 'Total Wishlist',
                'value' => 0,
            ],
        ];

        $data['wishlist'] = Wishlist::where('user_id', Auth::user()->id)->take(4)->get();

        return view('frontend.customer.dashboard', [
            "data" => $data
        ]);
    }

    public function purchaseHistory()
    {
        $data['title'] = 'Purchase History';
        $data['breadcrumb'] = ['Dashboard' => 'customer/dashboard'];
        $data['order_history'] = MasterOrder::where('tenant_id', Auth::user()->id)->paginate(10);

        return view('frontend.customer.purchase_history', [
            "data" => $data
        ]);
    }

    public function myWishlist()
    {
        $data['wishlist'] = Wishlist::where('user_id', Auth::user()->id)->paginate(25);

        return view('frontend.customer.wishlist', compact('data'));
    }

    public function myOrders()
    {
        $data['orders'] = Order::where('tenant_id', Auth::user()->id)->get();

        return view('frontend.customer.order', compact('data'));
    }

    public function duePayment()
    {
        $data['due_payments'] = DuePayment::where('tenant_id', Auth::user()->id)->get();

        return view('frontend.customer.due_payment', compact('data'));
    }

    public function checkout()
    {
        $data['carts'] = Cart::where('tenant_id', Auth::user()->id)->get();
        $cartAmount = $data['carts']->pluck('amount')->toArray();
        $discountAmount = $data['carts']->pluck('property_id');
        $data['country'] = Country::get();

        $data['totalAmount'] = Cart::where('tenant_id', Auth::user()->id)->sum('amount');
        $data['address'] = BillingAddress::where('user_id', Auth::id())->get();

        return view('frontend.customer.checkout', compact('data'));
    }

    public function placeOrder(Request $request)
    {
        if (!$request->has('billing_address_id')) {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'country_id' => 'required',
                'address' => 'required',
                'payment_method' => 'required',
                'terms_and_condition' => 'required',
            ]);
        }
        try {

            DB::beginTransaction();

            $cartQuery = Cart::where('tenant_id', auth()->id());
            $carts = $cartQuery->get();
            $tenant_id = \auth()->id();
            $grand_total = $cartQuery->selectRaw('SUM(amount - discount_amount) as total_amount_with_discount')
                ->value('total_amount_with_discount');
            $subtotal = $cartQuery->sum('amount');
            $discount_amount = $cartQuery->sum('discount_amount');

            if ($request->has('billing_address_id')) {
                $billing_address_id = $request->input('billing_address_id');
            } else {
                $address = new BillingAddress();
                $address->name = $request->input('name');
                $address->user_id = \auth()->id();
                $address->phone = $request->input('phone');
                $address->email = $request->input('email');
                $address->address = $request->input('address');
                $address->country_id = $request->input('country_id');
                $address->postal = $request->input('postal');
                $address->terms_and_condition = $request->input('terms_and_condition');
                $address->save();

                $billing_address_id = $address->id;
            }


            $order = new Order;
            $order->invoice_no = uniqid();
            $order->tenant_id = $tenant_id;
            $order->billing_address_id = $billing_address_id;
            $order->date = date('Y-m-d', time());
            $order->subtotal = $subtotal;
            $order->discount_amount = $discount_amount;
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
            }

            Session::put('latestOrderId', $order->id);
            Cart::where('tenant_id', \auth()->id())->delete();
            DB::commit();

            if (!empty(env('PAYPAL_CLIENT_ID')) && !empty(env('PAYPAL_SECRET'))){
                $provider = new PayPalClient;
                $provider->setApiCredentials(config('paypal'));
                $paypalToken = $provider->getAccessToken();
                $response = $provider->createOrder([
                    "intent" => "CAPTURE",
                    "application_context" => [
                        "return_url" => route('customer.paypalPaymentSuccess'),
                        "cancel_url" => route('customer.paypalPaymentCancelled'),
                    ],
                    "purchase_units" => [
                        0 => [
                            "amount" => [
                                "currency_code" => "USD",
                                "value" => $grand_total
                            ]
                        ]
                    ]
                ]);

                if (isset($response['id']) && $response['id'] != null) {
                    // redirect to approve href
                    foreach ($response['links'] as $links) {
                        if ($links['rel'] == 'approve') {
                            return redirect()->away($links['href']);
                        }
                    }
                    return redirect()
                        ->route('customer.cart')
                        ->with('danger', 'Something went wrong.');
                } else {
                    return redirect()
                        ->route('customer.cart')
                        ->with('danger', $response['message'] ?? 'Something went wrong.');
                }
            }else {
              return redirect()->back()->with('danger', _trans('alert.Please check payment method'));
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('danger', _trans('alert.Something went wrong!'));
        }
    }

    public function paypalPaymentSuccess(Request $request)
    {
        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();
            $response = $provider->capturePaymentOrder($request['token']);
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                $orderId = Session::get('latestOrderId');
                $order = Order::findOrFail($orderId);
                if ($order) {
                    OrderDetail::where('order_id', $order->id)->update(['payment_status' => 'unpaid']);
                }
                return redirect()
                    ->route('customer.dashboard')
                    ->with('error', _trans('alert.You have canceled the transaction'));
            } else {
                return redirect()
                    ->route('createTransaction')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', _trans('alert.Something went wrong!'));
        }
    }


    public function paypalPaymentCancelled(Request $request)
    {
        try {
            $orderId = Session::get('latestOrderId');
            $order = Order::findOrFail($orderId);
            if ($order) {
                OrderDetail::where('order_id', $order->id)->update(['payment_status' => 'unpaid']);
            }
            return redirect()
                ->route('customer.dashboard')
                ->with('error', _trans('alert.You have canceled the transaction'));
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', _trans('alert.Something went wrong!'));
        }
    }


    public function checkOutProcess(Request $request)
    {
        $cart = Cart::where('id', $request->cart_id)->first();
        $months = (int)$request->month;
        $cart->durations = $months;
        $cart->amount = $months * $cart->property->rent_amount;
        $cart->save();
        $cart['totalAmount'] = Cart::where('tenant_id', Auth::user()->id)->sum('amount');

        // Return the updated data as a JSON response
        return response()->json([
            'data' => $cart,
            'message' => 'Cart updated successfully'

        ]);
    }

    public function shopping()
    {
        return view('frontend.customer.shopping');
    }

    public function payment()
    {
        return view('frontend.customer.payment');
    }

    public function myCoupon()
    {
        return view('frontend.customer.coupon');
    }

    public function notification()
    {
        $data['notifications'] = Notification::where('user_id', '=', Auth::user()->id)->get();
        return view('frontend.customer.notification', compact('data'));
    }

    // Cart Start
    public function cart()
    {
        $data['carts'] = Cart::where('tenant_id', Auth::user()->id)->get();

        $data['totalAmount'] = Cart::where('tenant_id', Auth::user()->id)->sum('amount');
        return view('frontend.customer.cart', compact('data'));
    }

    public function removeCart($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    // Cart End

    public function removeWishlist($id)
    {
        $wishlist = Wishlist::find($id);
        if ($wishlist) {
            $wishlist->delete();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }


    public function orderDetails($id)
    {
        $data['order'] = Order::findOrFail($id);

        // Additional logic to retrieve and pass any necessary data to the view

        return view('frontend.customer.order_details', compact('data'));
    }

    public function invoiceDownload($id)
    {
        $data['order'] = Order::findOrFail($id);
        $pdf = \PDF::setOptions([
            'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/'),
        ])->loadView('frontend.customer.invoice', compact('data'));
        return $pdf->download();
        // return $pdf->stream();
    }


    public function refundDetails()
    {
        return view('frontend.customer.refund_details');
    }

    public function profile()
    {
        return 'ok';
        $data['profile'] = User::where('id', Auth::user()->id)->first();
        $data['address'] = BillingAddress::where('user_id', Auth::user()->id)->get();
        $data['accounts'] = BankAccount::where('user_id', Auth::user()->id)->first();
        $data['agreement'] = Rental::where('property_tenant_id', Auth::user()->id)->get();
        $data['emergencyContact'] = EmergencyContact::where('property_tenant_id', Auth::user()->id)->get();
        $data['documents'] = Document::where('user_id', Auth::user()->id)->get();
        $data['country'] = Country::get();
        return view('frontend.customer.profile', compact('data'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required',
            'date_of_birth' => 'required|date',
            'occupation' => 'required'
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->date_of_birth = $validatedData['date_of_birth'];
        $user->occupation = $validatedData['occupation'];
        if ($request->has('image')) {
            $user->image_id = $this->UploadImageCreate($request->image, 'backend/uploads/users');
        }
        $user->save();

        return redirect()->route('customer.profile')->with('success', 'Profile updated successfully!');
    }

    public function updateAccount(Request $request)
    {
        try {
            $account = BankAccount::where('user_id', Auth::user()->id)->first();


            $validatedData = $request->validate([
                'account_number' => 'required|max:255',
                'account_name' => 'required|max:255',
                'name' => 'required|max:255',
                'branch' => 'required|max:255'

            ]);

            $account->account_number = $validatedData['account_number'];
            $account->account_name = $validatedData['account_name'];
            $account->name = $validatedData['name'];
            $account->branch = $validatedData['branch'];
            $account->save();

            return redirect()->route('customer.profile')->with('success', 'Account updated successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function editAddress($id)
    {
        $address = BillingAddress::findOrFail($id);
        return view('frontend.customer.profile', compact('address'));
    }

    public function editEmergency($id)
    {
        $emergency = EmergencyContact::findOrFail($id);
        return view('frontend.customer.profile', compact('emergency'));
    }

    public function updateAddress(Request $request, $id)
    {
        $address = BillingAddress::findOrFail($id);
        $address->name = $request->input('name');
        $address->address = $request->input('address');
        $address->country_id = $request->input('country_id');
        $address->email = $request->input('email');
        $address->phone = $request->input('phone');
        $address->save();

        return redirect()
            ->route('customer.profile')
            ->with('success', 'Address updated successfully!');
    }

    public function updateEmergency(Request $request, $id)
    {
        $emergencyContact = EmergencyContact::findOrFail($id);
        $emergencyContact->name = $request->input('name');
        $emergencyContact->occupied = $request->input('occupied');
        $emergencyContact->relation = $request->input('relation');
        $emergencyContact->email = $request->input('email');
        $emergencyContact->phone = $request->input('phone');
        $emergencyContact->save();

        return redirect()
            ->route('customer.profile')
            ->with('success', 'Emergency contact updated successfully!');
    }

    public function updatePassword(Request $request)
    {

        $data = Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8',
        ]);
        if ($data->fails()) {

            return redirect()->route('customer.profile')->withError('Validations failed must be password and confirm password 8 characters and string');
        }
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('customer.profile')->with('Error', 'User Not Found');
        }

        $currentPassword = $request->input('password');
        $newPassword = $request->input('new_password');
        $confirmPassword = $request->input('confirm_password');


        if (!Hash::check($currentPassword, $user->password)) {
            return redirect()->route('customer.profile')->withError('Current password is incorrect');
        }

        if ($newPassword !== $confirmPassword) {
            return redirect()->route('customer.profile')->withError('Password is not matched');
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        return redirect()->route('customer.profile')->with('success', 'Your password has been changed.');
    }

    public function referral()
    {
        return view('frontend.customer.referral');
    }

    public function refund()
    {
        return view('frontend.customer.refund');
    }

    public function supportTicket()
    {
        return view('frontend.customer.support_ticket');
    }


    public function verifyAddress(Request $request)
    {
        $clientIpAddress = $request->getClientIp();
        $currentUserInfo = Location::get($clientIpAddress);
        $data = [];
        if ($currentUserInfo) {
            $data['country_name'] = $currentUserInfo->countryName;
            $data['country_code'] = $currentUserInfo->countryCode;
            $data['regionName'] = $currentUserInfo->regionName;
            $data['cityName'] = $currentUserInfo->cityName;
            $data['latitude'] = $currentUserInfo->latitude;
            $data['longitude'] = $currentUserInfo->longitude;

            $user = Auth::user();
            $user->address_details = $data;
            $user->save();
            return redirect()->route('customer.dashboard')->withSuccess('Address Verification submitted to Admin');
        }
    }
}
