<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Category;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PropertyFacilityTypeInterface;
use App\Models\Property\PropertyFacilityType;

//use Your Model

/**
 * Class PropertyCategoryRepository.
 */
class PropertyFacilityTypeRepository implements PropertyFacilityTypeInterface

{
    use CommonHelperTrait;
    private PropertyFacilityType $model;

    public function __construct(PropertyFacilityType $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return PropertyFacilityType::all();
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
        return PropertyFacilityType::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $facilityType                         = new $this->model;
            $facilityType->name                   = $request->name;
            $facilityType->status                 = $request->status;
            $facilityType->image_id               = $this->UploadImageCreate($request->image, 'backend/uploads/facilities');
            $facilityType->save();
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
            $facilityType                         = $this->model->findOrfail($id);
            $facilityType->name                   = $request->name;
            $facilityType->status                 = $request->status;
            $facilityType->image_id               = $this->UploadImageUpdate($request->image, 'backend/uploads/facilities', $facilityType->image_id);
            $facilityType->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {

        try {
            $facilityType   = $this->model->find($id);
            $this->UploadImageDelete($facilityType->image_id); // delete image & record
            $facilityType->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


}
