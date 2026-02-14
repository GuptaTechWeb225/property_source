<?php

namespace App\Repositories;

use App\Models\AccountCategory;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Rental;
use App\Models\Account;
use App\Models\Document;
use App\Models\BankAccount;
use App\Models\EmergencyContact;
use App\Interfaces\UserInterface;
use App\Models\Property\Property;
use App\Traits\CommonHelperTrait;
use App\Models\Property\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Http\Requests\Profile\PasswordUpdateRequest;

class UserRepository implements UserInterface
{
    use CommonHelperTrait;

    private User $model;
    private Rental $rentalModel;
    private Transaction $transactionModel;
    private $accountModel;
    private $accountCategory;
    private EmergencyContact $emergencyModel;
    private Document $documentModel;
    private Property $propertyModel;


    public function __construct(User $model, Rental $rentalModel, Account $accountModel, AccountCategory $accountCategory, EmergencyContact $emergencyModel, Document $documentModel, Transaction $transactionModel, Property $propertyModel)
    {
        $this->model = $model;
        $this->rentalModel = $rentalModel;
        $this->accountModel = $accountModel;
        $this->accountCategory = $accountCategory;
        $this->emergencyModel = $emergencyModel;
        $this->documentModel = $documentModel;
        $this->transactionModel = $transactionModel;
        $this->propertyModel = $propertyModel;
    }

    public function model()
    {
        return $this->model;
    }



    public function index($request)
    {
        $data = $this->model->query()->with('image', 'designation');

        $where = array();

        if ($request->search) {
            $where[] = ['name', 'like', '%' . $request->search . '%'];
        }

        if ($request->from && $request->to) {
            $data = $data->whereBetween('created_at', [Carbon::parse($request->from), Carbon::parse($request->to)->endOfDay()]);
        }

        if ($request->designation) {
            $data = $data->whereIn('designation_id', $request->designation);
        }

        $data = $data
            ->where($where)
            ->orderBy('id', 'DESC')
            ->paginate($request->show ?? 10);

        return $data;
    }

    public function landlords($request)
    {
        $data = $this->model->query()
            ->where('role_id', 4)
            ->with('image', 'designation')
            ->orderBy('id', 'DESC')
            ->paginate($request->show ?? 10);

        return $data;
    }

    public function status($request)
    {
        return $this->model->whereIn('id', $request->ids)->update(['status' => $request->status]);
    }

    public function deletes($request)
    {
        return $this->model->destroy((array)$request->ids);
    }

    public function getAll()
    {
        return User::query()->with('image')->where('id', '!=', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
    }

    public function store($request)
    {
        $roles = Role::all();
        try {
            $userStore = new $this->model;
            $userStore->name = $request->name;
            $userStore->role_id = $request->role;
            $userStore->email = $request->email;
            $userStore->phone = $request->phone;
            $userStore->password = Hash::make($request->password);
            $userStore->permissions = $request->permissions;
            $userStore->status = $request->status;
            $userStore->image_id = $this->UploadImageCreate($request->image, 'backend/uploads/users');
            // for verified
            $userStore->email_verified_at = now();
            $userStore->token = null;
            $userStore->created_by = auth()->id() ?? null;

            $userStore->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($request, $id)
    {
        try {
            $userUpdate = $this->model->findOrfail($id);
            $userUpdate->name = $request->name;
            $userUpdate->role_id = $request->role;
            $userUpdate->email = $request->email;
            $userUpdate->phone = $request->phone;
            if ($request->password) {
                $userUpdate->password = Hash::make($request->password);
            }
            $userUpdate->permissions = $request->permissions;
            $userUpdate->status = $request->status;
            $userUpdate->image_id = $this->UploadImageUpdate($request->image, 'backend/uploads/users', $userUpdate->image_id);
            $userUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function profileUpdate($request, $id)
    {
        try {
            $userUpdate = $this->model->findOrfail($id);
            $userUpdate->name = $request->name;
            $userUpdate->phone = $request->phone;
            $userUpdate->date_of_birth = $request->date_of_birth;
            $userUpdate->image_id = $this->UploadImageUpdate($request->image, 'backend/uploads/users', $userUpdate->image_id);
            $userUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->model->find($id);
            $this->UploadImageDelete($user->image_id); // delete image & record
            $user->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


    public function passwordUpdate(PasswordUpdateRequest $request, $id)
    {
        try {
            $userUpdate = $this->model->findOrfail($id);
            $userUpdate->password = Hash::make($request->password);
            $userUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function profileDetailsStore($request, $id, $type)
    {
        try {
            $profileDetailsUpdate = $this->model->findOrfail($id);
            $profileDetailsUpdate->name = $request->name;
            $profileDetailsUpdate->email = $request->email;
            $profileDetailsUpdate->date_of_birth = $request->date_of_birth;
            $profileDetailsUpdate->gender = $request->gender;
            $profileDetailsUpdate->phone = $request->phone;
            $profileDetailsUpdate->present_address = $request->present_address;
            $profileDetailsUpdate->nationality = $request->nationality;
            $profileDetailsUpdate->nid = $request->nid;
            $profileDetailsUpdate->passport = $request->passport;
            $profileDetailsUpdate->blood_group = $request->blood_group;

            $profileDetailsUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function rentalDetailsStore($request, $id, $type)
    {
        try {
            $rentalDetailsUpdate = $this->rentalModel->findOrfail($id);
            $rentalDetailsUpdate->move_in = $request->move_in;
            $rentalDetailsUpdate->move_out = $request->move_out;
            $rentalDetailsUpdate->rent_amount = $request->rent_amount;
            $rentalDetailsUpdate->rent_type = $request->rent_type;
            $rentalDetailsUpdate->rent_for = $request->rent_for;
            $rentalDetailsUpdate->reminder_date = $request->reminder_date;
            $rentalDetailsUpdate->note = $request->note;

            $rentalDetailsUpdate->save();

            $pro = $rentalDetailsUpdate->property;
            $pro->name = $request->name;
            $pro->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function accountDetailsStore($request, $id, $type)
    {
        try {
            $account = new $this->accountModel;
            $account->user_id = $id;
            $account->account_category_id = $request->account_category_id;
            $account->name = $request->name;
            $account->account_no = $request->account_no;
            $account->balance = $request->balance;
            $account->is_default = $request->is_default;
            $account->details = $request->details;
            $account->created_by = auth()->id();
            $account->updated_by = auth()->id();
            $account->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function accountCategoryStore($request, $id, $type)
    {
        try {
            $accountCategory = new $this->accountCategory;
            $accountCategory->user_id = $id;
            $accountCategory->name = $request->name;
            $accountCategory->type = $request->type;
            $accountCategory->status = $request->status;
            $accountCategory->created_by  = $request->status;
            $accountCategory->created_by  = Auth::id();
            $accountCategory->updated_by   = Auth::id();
            $accountCategory->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function emergencyDetailsStore($request, $id, $type)
    {
        try {
            if ($request->filled('id')) {
                $emergencyDetailsUpdate = $this->emergencyModel->findOrfail($request->id);
            } else {
                $emergencyDetailsUpdate = new $this->emergencyModel;
            }

            $emergencyDetailsUpdate->name = $request->name;
            $emergencyDetailsUpdate->occupied = $request->occupied;
            $emergencyDetailsUpdate->relation = $request->relation;
            $emergencyDetailsUpdate->email = $request->email;
            $emergencyDetailsUpdate->phone = $request->phone;
            $emergencyDetailsUpdate->type = 'Emergency';
            $emergencyDetailsUpdate->user_id = $id;
            $emergencyDetailsUpdate->image_id = $this->UploadImageUpdate($request->image, 'backend/uploads/users', $emergencyDetailsUpdate->image_id);
            $emergencyDetailsUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function documentDetailsStore($request, $id, $type)
    {
        try {
            $documentDetailsUpdate = new $this->documentModel;
            $documentDetailsUpdate->size = $request->image->getSize() / 1024;
            $documentDetailsUpdate->attachment_id = $this->UploadImageCreate($request->image, 'uploads/documents');
            $documentDetailsUpdate->filename = $request->image->getClientOriginalName();
            $documentDetailsUpdate->user_id = $id;
            $documentDetailsUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function transactionDetailsStore($request, $id, $type)
    {
        try {
            $transactionDetailsUpdate = new $this->transactionModel;
            $transactionDetailsUpdate->attachment_id = $this->UploadImageCreate($request->image, 'uploads/transactions');
            $transactionDetailsUpdate->property_id = $request->property_id;
            $transactionDetailsUpdate->property_tenant_id = $request->property_tenant_id;
            $transactionDetailsUpdate->rental_id = Rental::where('property_id', $request->property_id)->latest()->first()->id;
            $transactionDetailsUpdate->type = $request->type;
            $transactionDetailsUpdate->created_by = Auth::user()->id;
            $transactionDetailsUpdate->updated_by = Auth::user()->id;
            $transactionDetailsUpdate->payment_method = $request->payment_method;
            $transactionDetailsUpdate->date = $request->date;
            $transactionDetailsUpdate->amount = $request->amount;
            $transactionDetailsUpdate->note = $request->note;
            $transactionDetailsUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function deleteAttachment($id)
    {

        try {
            $this->UploadImageDelete($id);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
