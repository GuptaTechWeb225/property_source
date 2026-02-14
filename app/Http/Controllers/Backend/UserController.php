<?php

namespace App\Http\Controllers\Backend;

use App\Enums\Role;
use App\Interfaces\AccountCategoryInterface;
use App\Interfaces\AccountInterface;
use App\Models\AccountCategory;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Rental;
use App\Models\Account;
use App\Models\Document;
use PDF;
use Illuminate\Http\Request;
use App\Models\EmergencyContact;
use App\Interfaces\RoleInterface;
use App\Interfaces\UserInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    private $user;
    private $permission;
    private $role;
    private $rentalModel;
    protected $accountCategory;
    protected $account;

    function __construct(UserInterface $userInterface, PermissionInterface $permissionInterface, RoleInterface $roleInterface, AccountCategoryInterface $accountCategory, AccountInterface $account)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->user = $userInterface;
        $this->permission = $permissionInterface;
        $this->role = $roleInterface;
        $this->accountCategory = $accountCategory;
        $this->account = $account;
    }


    public function index()
    {
        $user = auth()->user();
        $data['users'] = $this->user->getAll();
        if ($user->role_id == Role::SUPER_ADMIN) {
            $data['users'] = $this->user->getAll();
        } else {
            $data['users'] = $this->user->model()
                ->where('created_by', $user->id)
                ->orWhereHas('orders.orderDetails.property', function ($query) {
                $query->where('user_id', auth()->id());
            })->with(['country', 'state', 'city', 'designation', 'image'])
                ->paginate(10);
        }
        $data['title'] = _trans('common.users');
        return view('backend.users.index', compact('data'));
    }

    public function profile()
    {
        $data['title'] = _trans('common.users');

        return view('backend.users.profile', compact('data'));
    }

    public function create()
    {
        $data['title'] = _trans('common.create_user');
        $data['permissions'] = $this->permission->all();
        $data['roles'] = $this->role->all();
        return view('backend.users.create', compact('data'));
    }

    public function store(UserStoreRequest $request)
    {

        $result = $this->user->store($request);
        if ($result) {
            return redirect()->route('users.index')->with('success', _trans('alert.user_created_successfully'));
        }
        return redirect()->route('users.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['user'] = $this->user->show($id);
        $data['title'] = _trans('common.users');
        $data['permissions'] = $this->permission->all();
        $data['roles'] = $this->role->all();
        return view('backend.users.edit', compact('data'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $result = $this->user->update($request, $id);
        if ($result) {
            return redirect()->route('users.index')->with('success', _trans('alert.user_updated_successfully'));
        }
        return redirect()->route('users.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->user->destroy($id)) :
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

    public function changeRole(Request $request)
    {
        $data['role_permissions'] = $this->role->show($request->role_id)->permissions;
        $data['permissions'] = $this->permission->all();
        return view('backend.users.permissions', compact('data'))->render();
    }

    public function status(Request $request)
    {

        if ($request->type == 'active') {
            $request->merge([
                'status' => 1
            ]);
            $this->user->status($request);
        }

        if ($request->type == 'inactive') {
            $request->merge([
                'status' => 0
            ]);
            $this->user->status($request);
        }

        return response()->json(["message" => __("Status update successful")], Response::HTTP_OK);
    }

    public function deletes(Request $request)
    {
        $this->user->deletes($request);

        return response()->json(["message" => __('Delete successful.')], Response::HTTP_OK);
    }


    public function profileDetails($id, $type)
    {
        $data['id'] = $id;
        $user = User::where('id', $id)->first();
        $emergency = EmergencyContact::where('user_id', $id)->first();
        $documents = Document::where('user_id', $id)->get();
        $rental = Rental::where('id', $id)->first();
        $accounts = Account::with('category')->where('user_id', $id)->get();
        $accountCategories = AccountCategory::where('user_id', $id)->get();
        $transactions = [];

        if (count($accounts)) {
            $transactions = Transaction::with('account')->where('account_id', $accounts->pluck('id'))->get();
        }

        switch ($type) {
            case 'basicInfo':
                $data['title'] = 'Basic Info';
                return view('backend.users.basic_info', compact('data', 'user'));
                break;

            case 'documents':
                $data['title'] = 'Documents';
                return view('backend.users.Documents', compact('data', 'user', 'documents'));
                break;
            case 'emergency':
                $data['title'] = 'Emergency';
                return view('backend.users.Emergency', compact('data', 'user', 'emergency'));
                break;

            case 'accountCategory':
                $data['title'] = 'Account Category';
                return view('backend.users.account_category', compact('data', 'user', 'accountCategories'));
                break;

            case 'accounts':
                $data['title'] = 'Account';
                return view('backend.users.Account', compact('data', 'user', 'accounts', 'accountCategories'));
                break;


            case 'transaction':
                $data['title'] = 'Transaction';
                return view('backend.users.Transaction', compact('data', 'user', 'transactions'));
                break;

            case 'agreements':
                $data['title'] = 'Agreements';
                return view('backend.users.Agreements', compact('data', 'rental', 'user'));
                break;
        }
    }

    public function profileDetailsStore(Request $request, $id, $type)
    {
        $data['id'] = $id;
        if ($type == 'basicInfo') {
            $result = $this->user->profileDetailsStore($request, $id, $type);
            if ($result) {
                return redirect()->route('users.profileDetails', [$id, $type])->with('success', _trans('alert.user_created_successfully'));
            }
            return redirect()->route('users.profileDetails', [$id, $type])->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        } elseif ($type == 'documents') {
            $result = $this->user->documentDetailsStore($request, $id, $type);

            if ($result) {
                return redirect()->route('users.profileDetails', [$id, $type])->with('success', _trans('alert.user_created_successfully'));
            }
            return redirect()->route('users.profileDetails', [$id, $type])->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        } elseif ($type == 'transaction') {
            $result = $this->user->transactionDetailsStore($request, $id, $type);

            if ($result) {
                return redirect()->route('users.profileDetails', [$id, $type])->with('success', _trans('alert.user_created_successfully'));
            }
            return redirect()->route('users.profileDetails', [$id, $type])->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        } elseif ($type == 'emergency') {
            $result = $this->user->emergencyDetailsStore($request, $id, $type);

            if ($result) {
                return redirect()->route('users.profileDetails', [$id, $type])->with('success', _trans('alert.user_created_successfully'));
            }
            return redirect()->route('users.profileDetails', [$id, $type])->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        } elseif ($type == 'accounts') {
            $result = $this->user->accountDetailsStore($request, $id, $type);

            if ($result) {
                return redirect()->route('users.profileDetails', [$id, $type])->with('success', _trans('alert.user_created_successfully'));
            }
            return redirect()->route('users.profileDetails', [$id, $type])->with('danger', _trans('alert.something_went_wrong_please_try_again'));

        } elseif ($type == 'accountCategory') {
            $result = $this->user->accountCategoryStore($request, $id, $type);

            if ($result) {
                return redirect()->route('users.profileDetails', [$id, $type])->with('success', _trans('alert.user_created_successfully'));
            }
            return redirect()->route('users.profileDetails', [$id, $type])->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        } elseif ($type == 'agreements') {
            $result = $this->user->rentalDetailsStore($request, $id, $type);
            if ($result) {
                return redirect()->route('users.profileDetails', [$id, $type])->with('success', _trans('alert.user_created_successfully'));
            }
            return redirect()->route('users.profileDetails', [$id, $type])->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }


    public function deleteAccountCategory($id)
    {
        try {
            $this->accountCategory->destroy($id);
            return redirect()->back()->with('success', _trans('alert.account_category_deleted_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }

    public function deleteAccount($id)
    {
        try {
            $this->account->destroy($id);
            return redirect()->back()->with('success', _trans('alert.account_deleted_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }

    public function deleteAttachment($id)
    {
        $result = $this->user->deleteAttachment($id);
        if ($result) {
            return redirect()->back()->with('success', _trans('alert.attachment_deleted_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function createPDF($id)
    {
        // retreive all records from db
        $data = Transaction::where('property_tenant_id', $id)->get();
        $dataOne = Transaction::where('id', $id)->first();
        // $totalIncome = Transaction::where('property_tenant_id', $id)->where('type', 'income')->count();
        $totalIncome = Transaction::where('property_tenant_id', $id)->where('type', '=', 'income')->sum('amount');
        $totalRent = Transaction::where('property_tenant_id', $id)->where('type', '=', 'rent')->sum('amount');
        $totalExpense = Transaction::where('property_tenant_id', $id)->where('type', '=', 'expense')->sum('amount');
        $totalDeposit = Transaction::where('property_tenant_id', $id)->where('type', '=', 'deposit')->sum('amount');
        $totalOther = Transaction::where('property_tenant_id', $id)->where('type', '=', 'other')->sum('amount');

        $totalAmount = $totalIncome - $totalExpense + $totalRent + $totalDeposit - $totalOther;

        $pdf = PDF::loadView('backend.users.transaction_pdf', ['data' => $data, 'dataOne' => $dataOne, 'totalAmount' => $totalAmount]);
        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
    }
}
