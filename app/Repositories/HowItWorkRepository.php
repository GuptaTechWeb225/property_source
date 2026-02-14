<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\HowItWorkInterface;
use App\Models\HowItWork;

//use Your Model

/**
 * Class HowItWorkRepository.
 */
class HowItWorkRepository implements HowItWorkInterface
{
    use CommonHelperTrait;
    private HowItWork $model;

    public function __construct(HowItWork $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return HowItWork::all();
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
        return HowItWork::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $howItWorkStore                  = new $this->model;
            $howItWorkStore->title            = $request->title;
            $howItWorkStore->message         = $request->message;
            $howItWorkStore->status          = $request->status;
            $howItWorkStore->image_id        = $this->UploadImageCreate($request->image, 'backend/uploads/howItWorks');
            $howItWorkStore->save();
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
            $howItWorkUpdate                       = $this->model->findOrfail($id);
            $howItWorkUpdate->title                 = $request->title;
            $howItWorkUpdate->message              = $request->message;
            $howItWorkUpdate->status               = $request->status;
            $howItWorkUpdate->image_id             = $this->UploadImageUpdate($request->image, 'backend/uploads/howItWorks', $howItWorkUpdate->image_id);
            $howItWorkUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $howItWorkDestroy   = $this->model->find($id);
            $this->UploadImageDelete($howItWorkDestroy->image_id); // delete image & record
            $howItWorkDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


}
