<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\HowItWork;
use App\Traits\CommonHelperTrait;
use App\Interfaces\HeroSectionInterface;
use App\Models\HeroSection;

//use Your Model

/**
 * Class HowItWorkRepository.
 */
class HeroSectionRepository implements HeroSectionInterface
{
    use CommonHelperTrait;
    private HeroSection $model;

    public function __construct(HeroSection $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return HeroSection::all();
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
        return HeroSection::latest()->paginate(15);
    }

    public function store($request)
    {

        try {
            $heroSectionStore                                 = new $this->model;
            $heroSectionStore->title                          = $request->title;
            $heroSectionStore->highlight_title_one            = $request->highlight_title_one;
            $heroSectionStore->highlight_title_two            = $request->highlight_title_two;
            $heroSectionStore->description                    = $request->description;
            $heroSectionStore->btn_one                        = $request->btn_one;
            $heroSectionStore->btn_two                        = $request->btn_two;
            $heroSectionStore->status                         = $request->status;
            $heroSectionStore->image_id                       = $this->UploadImageCreate($request->image, 'backend/uploads/heroSections');
            $heroSectionStore->save();
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
            $heroSectionUpdate                                 = $this->model->findOrfail($id);
            $heroSectionUpdate->title                          = $request->title;
            $heroSectionUpdate->highlight_title_one            = $request->highlight_title_one;
            $heroSectionUpdate->highlight_title_two            = $request->highlight_title_two;
            $heroSectionUpdate->description                    = $request->description;
            $heroSectionUpdate->btn_one                        = $request->btn_one;
            $heroSectionUpdate->btn_two                        = $request->btn_two;
            $heroSectionUpdate->status                         = $request->status;
            $heroSectionUpdate->image_id                       = $this->UploadImageUpdate($request->image, 'backend/uploads/heroSections', $heroSectionUpdate->image_id);
            $heroSectionUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $heroSectionDestroy   = $this->model->find($id);
            $this->UploadImageDelete($heroSectionDestroy->image_id); // delete image & record
            $heroSectionDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


}
