<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\BusinessModel;
use App\Traits\CommonHelperTrait;
use App\Interfaces\BusinessModelInterface;
use App\Models\HomePage;

//use Your Model

/**
 * Class HowItWorkRepository.
 */
class BusinessModelRepository implements BusinessModelInterface
{
    use CommonHelperTrait;
    private BusinessModel $model;

    public function __construct(BusinessModel $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        $data['businessModels']          = BusinessModel::all();
        $data['homePage']                = HomePage::where('status', 1)->get();

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
        return BusinessModel::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $businessModelStore                  = new $this->model;
            $businessModelStore->keypoint        = $request->keypoint;
            $businessModelStore->status          = $request->status;
            $businessModelStore->image_id        = $this->UploadImageCreate($request->image, 'backend/uploads/businessModels');
            $businessModelStore->save();
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
            $businessModelUpdate                       = $this->model->findOrfail($id);
            $businessModelUpdate->keypoint             = $request->keypoint;
            $businessModelUpdate->status               = $request->status;
            $businessModelUpdate->image_id             = $this->UploadImageUpdate($request->image, 'backend/uploads/businessModels', $businessModelUpdate->image_id);
            $businessModelUpdate->save();
            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $businessModelDestroy   = $this->model->find($id);
            $this->UploadImageDelete($businessModelDestroy->image_id); // delete image & record
            $businessModelDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
