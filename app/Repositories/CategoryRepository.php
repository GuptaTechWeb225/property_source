<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Category;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\CategoryInterface;

//use Your Model

/**
 * Class CategoryRepository.
 */
class CategoryRepository implements CategoryInterface
{
    use CommonHelperTrait;
    private Category $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return Category::all();
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
        return Category::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $categoryStore                         = new $this->model;
            $categoryStore->title                  = $request->title;
            $categoryStore->subtitle               = $request->subtitle;
            $categoryStore->description            = $request->description;
            $categoryStore->short_description      = $request->short_description;
            $categoryStore->slug                   = $request->slug;
            $categoryStore->status                 = $request->status;
            $categoryStore->image_id               = $this->UploadImageCreate($request->image, 'backend/uploads/categories');
            $categoryStore->icon_id               = $this->UploadIconCreate($request->icon, 'backend/uploads/categories/icons');
            $categoryStore->save();
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
            $categoryUpdate                         = $this->model->findOrfail($id);
            $categoryUpdate->title                  = $request->title;
            $categoryUpdate->subtitle               = $request->subtitle;
            $categoryUpdate->description            = $request->description;
            $categoryUpdate->short_description      = $request->short_description;
            $categoryUpdate->slug                   = $request->slug;
            $categoryUpdate->status                 = $request->status;
            $categoryUpdate->image_id               = $this->UploadImageUpdate($request->image, 'backend/uploads/categories', $categoryUpdate->image_id);
            $categoryUpdate->icon_id               = $this->UploadIconUpdate($request->icon, 'backend/uploads/categories/icons', $categoryUpdate->icon_id);
            $categoryUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $categoryDestroy   = $this->model->find($id);
            $this->UploadImageDelete($categoryDestroy->image_id); // delete image & record
            $this->UploadIconDelete($categoryDestroy->icon_id); // delete image & record
            $categoryDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


}
