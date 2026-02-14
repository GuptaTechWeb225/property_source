<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;
use App\Interfaces\PropertyCategoryInterface;
use App\Interfaces\PropertyFacilityTypeInterface;
use App\Http\Requests\PropertyCategory\PropertyCategoryStoreRequest;
use App\Http\Requests\PropertyCategory\PropertyCategoryUpdateRequest;
use App\Http\Requests\PropertyCategory\PropertyFacilityTypeStoreRequest;
use App\Http\Requests\PropertyCategory\PropertyFacilityTypeUpdateRequest;

class PropertyFacilityTypeController extends Controller
{
    private $FacilityType;
    private $permission;

    function __construct(PropertyFacilityTypeInterface $propertyFacilityTypeInterface, PermissionInterface $permissionInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->FacilityType   = $propertyFacilityTypeInterface;
        $this->permission = $permissionInterface;
    }

    public function index()
    {

        $data['facilityType']  = $this->FacilityType->getAll();
        $data['title']      = _trans('common.Facility Types');
        return view('backend.facility_type.index', compact('data'));
    }

    public function create()
    {

        $data['title']       = _trans('common.Create Facility Type');
        $data['permissions'] = $this->permission->all();
        return view('backend.facility_type.create', compact('data'));
    }

    public function store(PropertyFacilityTypeStoreRequest $request)
    {
        $result = $this->FacilityType->store($request);
        if ($result) {
            return redirect()->route('properties.facilityType.index')->with('success', _trans('alert.Facility Type Created successfully'));
        }
        return redirect()->route('properties.facilityType.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['FacilityType']    = $this->FacilityType->show($id);
        $data['title']       = _trans('common.categories');
        $data['permissions'] = $this->permission->all();
        return view('backend.facility_type.edit', compact('data'));
    }

    public function update(PropertyFacilityTypeUpdateRequest $request, $id)
    {
        $result = $this->FacilityType->update($request, $id);
        if ($result) {
            return redirect()->route('properties.facilityType.index')->with('success', _trans('alert.Facility Type updated successfully'));
        }
        return redirect()->route('properties.facilityType.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {

        if ($this->FacilityType->destroy($id)) :
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
}
