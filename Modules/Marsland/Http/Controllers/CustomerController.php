<?php

namespace Modules\Marsland\Http\Controllers;


use App\Models\Account;
use App\Models\Cart;
use App\Models\City;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\DuePayment;
use App\Models\MasterOrder;
use App\Services\NotificationService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Locations\Country;
use App\Models\Property\Property;
use App\Traits\CommonHelperTrait;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Marsland\Entities\FamilyMember;
use Modules\Marsland\Entities\TenantAsset;

class CustomerController extends Controller
{
    use CommonHelperTrait;

    public function logout()
    {
        Auth::guard('customer')->logout();
        Auth::logout();
        return redirect()->route('home');
    }

    public function dashboard()
    {
        $data['profile'] = auth()->guard('customer')->user();
        $data['order'] = Order::where('tenant_id', Auth::user()->id)->count();
        $data['coupon'] = Order::where('tenant_id', Auth::user()->id)->whereNotNull('coupon_code')->count();
        $data['total_amount'] = Order::where('tenant_id', Auth::user()->id)->sum('grand_total');
        // $data['complete_order'] = MasterOrder::where('tenant_id', Auth::user()->id)->where('payment_status', 'approved')->count();
        $data['cart'] = Cart::where('tenant_id', Auth::user()->id)->count();
        $data['wishlist'] = Wishlist::where('user_id', Auth::user()->id)->count();
        $data['order_history'] = Order::where('tenant_id', Auth::user()->id)->take(5)->get();
        $data['complete_order'] = Order::whereHas('orderDetails', function ($query) {
            $query->where('payment_status', 'approved');
        })->where('tenant_id', Auth::user()->id)->count();

        return view('marsland::customer.dashboard', [
            "data" => $data
        ]);
    }

    public function profile()
    {
        $user = Auth::user();

        return view('marsland::customer.profile', [
            "user" => $user
        ]);
    }

    public function wishlist()
    {
        $wishlists = Wishlist::with(['property'])->where('user_id', Auth::user()->id)->paginate(25);

        return view('marsland::customer.wishlist', [
            "wishlists" => $wishlists
        ]);
    }

    public function wishlistAdd(Request $request)
    {
        $propertyId = $request->input('property_id', null);

        $property = Property::find($propertyId);
        if (!$property) {
            return back()->with('error', _trans('common.Invalid property id.'));
        }

        try {
            $wishlist = Wishlist::where('user_id', Auth::id())->where('property_id', $propertyId)->first();
            if ($wishlist) {
                $wishlist->delete();

                return back()->with('success', _trans('common.Removed from wishlist.'));
            }

            $wishlist = new Wishlist();

            $wishlist->user_id = Auth::id();
            $wishlist->property_id = $propertyId;
            $wishlist->save();

            return back()->with('success', _trans('common.Added to wishlist.'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());

            return back()->with('error', _trans('common.Something went wrong.'));
        }
    }

    public function wishlistDelete($id)
    {
        try {
            $wishlist = Wishlist::where('user_id', Auth::id())->find($id);

            if (!$wishlist) {
                return back()->with('error', _trans('common.Wishlist not found.'));
            }

            $wishlist->delete();

            return back()->with('success', _trans('common.Removed from wishlist.'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());

            return back()->with('error', _trans('common.Something went wrong.'));
        }
    }

    public function properties()
    {
        $tenant_id = \auth()->id();
        $data['title'] = _trans('common.Properties List');
        $data['orders'] = Order::with('orderDetails.property')->where('tenant_id', $tenant_id)->get();
        $data['accounts'] = Account::where('user_id', $tenant_id)->get();
        return view('marsland::customer.properties')->with($data);
    }

    public function propertyDetails($id)
    {
        $tenant_id = \auth()->id();
        $data['title'] = _trans('common.Properties Details');
        $data['order_details'] = orderDetail::with('property','assets.attachment')->findOrFail($id);
        $data['accounts'] = Account::where('user_id', $tenant_id)->get();
        return view('marsland::customer.property_details')->with($data);
    }


    public function assetsStore(Request $request)
    {
        $request->validate([
            'order_detail_id' => 'required',
            'property_id' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $data = $request->only('order_detail_id', 'property_id', 'name', 'note');
            if ($request->hasFile('attachment')){
                $data['attachment_id'] = $this->UploadImageCreate($request->file('attachment'),'tenant_asset');
            }
            $data['serial'] = uniqid();
            $data['tenant_id'] = auth()->id();
            TenantAsset::create($data);
            DB::commit();
            return redirect()->back()->with('success', _trans('landlord.Successfully created'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('danger', _trans('landlord.Something went wrong!'));
        }
    }


    public function assetsDelete($id)
    {
        try {

            $asset = TenantAsset::findOrFail($id);
            $this->UploadImageDelete($asset->attachment_id);
            $asset->delete();
            return redirect()->back()->with('success', _trans('landlord.Successfully deleted'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('danger', _trans('landlord.Something went wrong!'));
        }

    }


    public function duePayment()
    {
        $duePayments = DuePayment::with('property')->where('tenant_id', Auth::user()->id)->paginate(25);
        return view('marsland::customer.due-payment', [
            "duePayments" => $duePayments
        ]);
    }

    public function setting()
    {
        $user = Auth::user();
        $countries = Country::where('status', 1)->select("id", "name")->get();
        return view('marsland::customer.setting', [
            "user" => $user,
            "countries" => $countries,
            "cities" => []
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'occupation' => 'required',
            'country_id' => 'nullable | integer',
            'city_id' => 'nullable | integer',
        ]);

        $user->name = $request->name;
        $user->date_of_birth = $request->date_of_birth;
        $user->occupation = $request->occupation;
        $user->country_id = $request->country_id;
        $user->city_id = $request->city_id;
        $user->address = $request->address;
        $user->personal_code = $request->personal_code;
        if ($request->has('image')) {
            $user->image_id = $this->UploadImageUpdate($request->image, 'backend/uploads/users', $user->image_id);
        }

        $user->save();

        return back()->with('success', _trans('common.Profile updated successfully.'));
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'same:confirm_password'],
            'confirm_password' => 'required',
        ],
            [
                'old_password.required' => _trans('validation.The old password is required'),
                'password.required' => _trans('validation.The password field is required.'),
                'password.same' => _trans('validation.The password and confirmation password must match.'),
                'confirm_password.required' => _trans('validation.The confirmation password field is required.'),
            ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', _trans('common.The old password is incorrect.'));
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', _trans('common.Password updated successfully'));
    }


    public function notifications()
    {
        $data['notifications'] = Notification::where('receiver_id', \auth()->id())
            ->orderBy('is_read', 'ASC')
            ->get();
        return view('marsland::customer.notifications')->with($data);
    }

    public function notificationDetails($id)
    {
        try {
            $notification = Notification::findOrFail($id);
            $notification->is_read = true;
            $notification->read_at = now();
            $notification->save();
            $data['notification'] = $notification;
            return view('marsland::customer.notification_details')->with($data);
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'alert.Something went wrong');
        }
    }


    public function generatePersonalCode()
    {
        do {
            $uniqueId = uniqid('', false);
            $digits = preg_replace('/[^0-9]/', '', $uniqueId);
            $generatedCode = substr($digits, 0, 6);
            $prefix = 'G-';
            $finalCode = $prefix . $generatedCode;
            $existingUser = User::where('personal_code', $finalCode)->first();
        } while ($existingUser);

        return response()->json($finalCode, 200);
    }


}
