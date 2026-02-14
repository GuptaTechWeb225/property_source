<?php

namespace App\Http\Controllers\Backend;

use App\Enums\Role;
use App\Http\Requests\Tenant\TenantUpdateRequest;
use App\Interfaces\AdvertisementInterface;
use App\Models\Advertisement;
use App\Models\Designation;
use App\Models\Locations\Country;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Interfaces\TenantInterface;
use App\Http\Controllers\Controller;
use App\Interfaces\PropertyInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;
use App\Http\Requests\Tenant\TenantStoreRequest;

class TenantController extends Controller
{
    private $tenantInterface;
    private $permission;
    private $property;

    function __construct(TenantInterface $tenantInterface, PermissionInterface $permissionInterface, PropertyInterface $property)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->tenantInterface = $tenantInterface;
        $this->permission = $permissionInterface;
        $this->property = $property;
    }

    public function index()
    {
        $data['title'] = _trans('common.tenant');
        $user = auth()->user();
        $data['tenant'] = $this->tenantInterface->getAll();
        if ($user->role_id == Role::SUPER_ADMIN) {
            $data['tenant'] = $this->tenantInterface->getAll();
        } else {
            $data['tenant'] = $this->tenantInterface->model()->whereHas('orders.orderDetails.property', function ($query)  {
                $query->where('user_id', auth()->id());
            })->with(['country', 'state', 'city', 'designation', 'image'])->paginate(10);
        }

        return view('backend.tenant.index', compact('data'));
    }

    public function create()
    {
        $data['title'] = _trans('common.Tenant Create');
        $data['properties'] = $this->property->list();
        $data['countries'] = Country::select('id', 'name')->get();
        return view('backend.tenant.create')->with($data);
    }


    public function checkout($advertisementId)
    {
        $data['title'] = _trans('common.Choose Property');
        return view('backend.tenant.buy_property')->with($data);
    }

    public function store(TenantStoreRequest $request)
    {
        $result = $this->tenantInterface->store($request);
        if ($result) {
            return redirect()->route('tenants.index')->with('success', _trans('alert.tenant_created_successfully'));
        }
        return redirect()->route('tenants.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['tenant'] = $this->tenantInterface->show($id);
        $data['title'] = _trans('common.Tenant');
        $data['permissions'] = $this->permission->all();
        $data['properties'] = $this->property->list();
        $data['countries'] = Country::select('id', 'name')->get();
        $data['designations'] = \App\Models\Hrm\Designation::select('id', 'title')->get();
        return view('backend.tenant.edit')->with($data);
    }

    public function update(TenantUpdateRequest $request, $id)
    {
        $result = $this->tenantInterface->update($request, $id);
        if ($result) {
            return redirect()->route('tenants.index')->with('success', _trans('alert.tenant_updated_successfully'));
        }
        return redirect()->route('tenants.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }


    public function verifyAddress($id, $status)
    {
        $tenant = $this->tenantInterface->show($id);
        if ($tenant) {
            $tenant->req_address_verify = $status == 2 ? 1 : 0;
            $tenant->address_verify = $status;
            $tenant->save();
        }
        return redirect()->back()->with('success', _trans('alert.tenant_updated_successfully'));
    }


    public function show($id)
    {
        $data['tenant'] = $this->tenantInterface->show($id);
        $data['title'] = _trans('common.Tenant');
        return view('backend.tenant.show')->with($data);
    }

    public function delete($id)
    {
        if ($this->tenantInterface->destroy($id)) :
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

    public function verify($id)
    {
        $tenant = $this->tenantInterface->show($id);
        if (!$tenant->address_verify) {
            $tenant->req_address_verify = 1;
            $tenant->save();
            $success[0] = "Operation Successfully";
            $success[1] = "Success";
            $success[2] = "Success";
            return response()->json($success);
        }
        $success[0] = "Something went wrong, please try again.";
        $success[1] = 'error';
        $success[2] = "oops";
        return response()->json($success);
    }
}
