<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Feature;
use App\Traits\CommonHelperTrait;
use App\Interfaces\FeatureInterface;


//use Your Model

/**
 * Class HowItWorkRepository.
 */
class FeatureRepository implements FeatureInterface
{
    use CommonHelperTrait;
    private Feature $model;

    public function __construct(Feature $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return Feature::all();
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
        return Feature::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $featureStore                   = new $this->model;
            $featureStore->title            = $request->title;
            $featureStore->description      = $request->description;
            $featureStore->status           = $request->status;
            $featureStore->icon_id               = $this->UploadIconCreate($request->icon, 'backend/uploads/features/icons');
            $featureStore->save();
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
            $featureUpdate                        = $this->model->findOrfail($id);
            $featureUpdate->title                 = $request->title;
            $featureUpdate->description           = $request->description;
            $featureUpdate->status                = $request->status;
            $featureUpdate->icon_id               = $this->UploadIconUpdate($request->icon, 'backend/uploads/features/icons', $featureUpdate->icon_id);
            $featureUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $featureDestroy   = $this->model->find($id);
            $this->UploadIconDelete($featureDestroy->icon_id); // delete image & record
            $featureDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


}
