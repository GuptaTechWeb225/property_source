<?php

namespace App\Http\Controllers\Backend;

use App\Enums\ApprovalStatus;
use App\Models\Account;
use App\Models\Advertisement;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Property\PropertyCategory;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Search;
use App\Interfaces\UserInterface;
use App\Models\Appointment;
use App\Models\Hrm\Designation;
use App\Models\Language;
use App\Models\Permission;
use App\Models\Property\Property;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    private $user;

    public function __construct(UserInterface $userInterface)
    {
        $this->middleware('auth');
        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->user = $userInterface;
    }

    public function index(Request $request)
    {
        // Orders

        $properties = Property::where('user_id', auth()->id())->pluck('id')->toArray();
        $orders = Order::latest()
            ->whereHas('orderDetails', function ($query) use ($properties) {
                $query->whereIn('property_id', $properties);
            })->get();
        $order['total'] = count($orders);

        $order_sum['total'] = $orders->sum('grand_total');
        $order_sum['paid'] = $orders->sum('paid_amount');
        $order_sum['due'] = $orders->sum('due_amount');
        $order_sum['discount'] = $orders->sum('discount_amount');
        $order_sum['recents'] = $orders->take(5);
        $order['approved'] = Order::whereHas('orderDetails', function ($query) {
            $query->where('status', 'approved');
        })->count();

        $order['pending'] = Order::whereHas('orderDetails', function ($query) {
            $query->where('status', 'pending');
        })->count();

        $appointment['total'] = Appointment::query()->count();
        $appointment['approved'] = Appointment::where('status', 'completed')->count();
        $appointment['pending'] = Appointment::where('status', 'processing')->count();

        $advertisement['total'] = Advertisement::count();
        $advertisement['approved'] = Advertisement::where('approval_status', ApprovalStatus::APPROVED)->count();
        $advertisement['pending'] = Advertisement::where('approval_status', ApprovalStatus::PENDING)->count();

        $category['total'] = PropertyCategory::count();
        $category['active'] = PropertyCategory::where('status', 'active')->count();
        $category['inactive'] = PropertyCategory::where('status', 'inactive')->count();

        // Transaction
        $user  = Auth::user();
        if ($user->role_id == 1) {
            $transactions = Transaction::whereYear('date', Carbon::now()->year)
                ->get();
            $order_sum['recents_trans'] = Transaction::latest()->take(5)->get();
        } else {
            $account = Account::where('user_id', \auth()->id())->get()->pluck('id');
            $transactions = Transaction::whereIn('account_id', $account)->whereYear('date', Carbon::now()->year)
                ->get();
            $order_sum['recents_trans'] = Transaction::latest()->whereIn('account_id', $account)->take(5)->get();
        }


        $months = [];
        // Loop through each month of the year
        for ($month = 1; $month <= 12; $month++) {
            // Create a Carbon instance for the current month
            $currentMonth = Carbon::createFromDate(null, $month, 1);
            // Get the month name and add it to the array
            $months[] = $currentMonth->format('F');
        }

        $incomeData = [];
        $expenseData = [];

        foreach ($months as $month) {
            $incomeData[] = $transactions->where('type', 'credit')
                ->filter(function ($transaction) use ($month) {
                    return Carbon::parse($transaction->date)->format('F') === $month;
                })
                ->sum('amount');

            $expenseData[] = $transactions->where('type', 'debit')
                ->filter(function ($transaction) use ($month) {
                    return Carbon::parse($transaction->date)->format('F') === $month;
                })
                ->sum('amount');
        }

        //Landlords
        $landlord['total'] = User::where('role_id', 4)->count();
        $landlord['active'] = User::where('role_id', 4)->where('status', 1)->count();
        $landlord['inactive'] = User::where('role_id', 4)->where('status', 0)->count();

        //Tenant
        $tenant['total'] = User::where('role_id', 5)->count();
        $tenant['active'] = User::where('role_id', 5)->where('status', 1)->count();
        $tenant['inactive'] = User::where('role_id', 5)->where('status', 0)->count();

        //Property
        $property['total'] = Property::count();
        $property['active'] = Property::where('status', 1)->count();
        $property['inactive'] = Property::where('status', 0)->count();

        //Blogs
        $blogs['total'] = Blog::count();
        $blogs['active'] = Blog::where('status', 1)->count();
        $blogs['inactive'] = Blog::where('status', 0)->count();

        $appointments = Appointment::with('timeSlot:id,start_time,end_time')
            ->select('id', 'date', 'name', 'email', 'phone', 'time_slot_id', 'time', 'type')
            ->latest('id')
            ->when(!isSuperAdmin(), function ($query) use ($properties) {
                $query->whereIn('property_id', $properties);
            })
            ->get();
        //users
        $user = $this->user->getAll();

        $users = $this->user->index($request);
        $designations = Designation::query()->get(['id', 'title']);

        return view('backend.dashboard', [
            "users" => $users,
            "property" => $property,
            "blogs" => $blogs,
            "tenant" => $tenant,
            "user" => $user,
            "designations" => $designations,
            "landlord" => $landlord,
            "order" => $order,
            "appointments" => $appointments,
            "appointment" => $appointment,
            "advertisement" => $advertisement,
            "category" => $category,
            "incomeData" => $incomeData,
            "expenseData" => $expenseData,
            "months" => $months,
            "order_sum" => $order_sum
        ]);
    }

    public function schoolDashboard()
    {
        /*
        Summery
         */

        //Users
        $users['total'] = User::count();
        $users['active'] = User::where('status', 1)->count();
        $users['inactive'] = User::where('status', 4)->count();

        //Roles
        $roles['total'] = Role::count();
        $roles['active'] = Role::where('status', 1)->count();
        $roles['inactive'] = Role::where('status', 4)->count();

        //Languages
        $languages['total'] = Language::count();
        $languages['active'] = Language::count(); //lanuage status are not assigned
        $languages['inactive'] = 0; //lanuage status are not assigned

        //Languages
        $permissions['total'] = Permission::count();
        $permissions['active'] = Permission::count(); //lanuage status are not assigned
        $permissions['inactive'] = 0; //lanuage status are not assigned

        //users
        $user = $this->user->getAll();

        return view('backend.school_dashboard', [
            "users" => $users,
            "roles" => $roles,
            "languages" => $languages,
            "permissions" => $permissions,
            "user" => $user,
        ]);
    }

    public function lmsDashboard()
    {
        /*
        Summery
         */

        //Users
        $users['total'] = User::count();
        $users['active'] = User::where('status', 1)->count();
        $users['inactive'] = User::where('status', 4)->count();

        //Roles
        $roles['total'] = Role::count();
        $roles['active'] = Role::where('status', 1)->count();
        $roles['inactive'] = Role::where('status', 4)->count();

        //Languages
        $languages['total'] = Language::count();
        $languages['active'] = Language::count(); //lanuage status are not assigned
        $languages['inactive'] = 0; //lanuage status are not assigned

        //Languages
        $permissions['total'] = Permission::count();
        $permissions['active'] = Permission::count(); //lanuage status are not assigned
        $permissions['inactive'] = 0; //lanuage status are not assigned

        //users
        $user = $this->user->getAll();

        return view('backend.lms_dashboard', [
            "users" => $users,
            "roles" => $roles,
            "languages" => $languages,
            "permissions" => $permissions,
            "user" => $user,
        ]);
    }

    public function crmDashboard()
    {
        /*
        Summery
         */

        //Users
        $users['total'] = User::count();
        $users['active'] = User::where('status', 1)->count();
        $users['inactive'] = User::where('status', 4)->count();

        //Roles
        $roles['total'] = Role::count();
        $roles['active'] = Role::where('status', 1)->count();
        $roles['inactive'] = Role::where('status', 4)->count();

        //Languages
        $languages['total'] = Language::count();
        $languages['active'] = Language::count(); //lanuage status are not assigned
        $languages['inactive'] = 0; //lanuage status are not assigned

        //Languages
        $permissions['total'] = Permission::count();
        $permissions['active'] = Permission::count(); //lanuage status are not assigned
        $permissions['inactive'] = 0; //lanuage status are not assigned

        //users
        $user = $this->user->getAll();

        return view('backend.landlord_dashboard', [
            "users" => $users,
            "roles" => $roles,
            "languages" => $languages,
            "permissions" => $permissions,
            "user" => $user,
        ]);
    }

    public function searchMenuData(Request $request)
    {
        $targets = Search::where('url', 'LIKE', "%{$request->searchData}%")->get();
        $view = View('backend.menu-autocomplete', compact('targets'))->render();
        return response()->json(['data' => $view]);
    }


    public function globalSearch(Request $request)
    {
        $keyword = $request->input('keyword');
        $result = Tenant::whereHas('orders.orderDetails.property', function ($query) {
            $query->where('user_id', auth()->id());
        })->with(['country', 'state', 'city', 'designation', 'image'])
            ->select('id', 'name', 'present_address', 'image_id', 'zip_code')
            ->where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%")
                    ->orWhere('zip_code', 'like', "%$keyword%")
                    ->orWhere('present_address', 'like', "%$keyword%");
            })
            ->get();

        $searchResult = $result->map(function ($data) {
            return [
                'tenant_name' => $data->name,
                'tenant_image' => @globalAsset($data->image->path),
                'country' => @$data->country->name,
                'state' => @$data->state->name,
                'city' => @$data->city->name,
                'post_code' => @$data->zip_code,
                'address' => $data->present_address,
                'details_url' => route('users.profileDetails', [$data['id'], 'basicInfo']),
            ];
        });

        return response()->json($searchResult);
    }
}
