<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Property\PropertyCategory;
use App\Interfaces\PropertyCategoryInterface;
use App\Models\Property\CategoryWiseDocumentTemplate;

//use Your Model

/**
 * Class PropertyCategoryRepository.
 */
class PropertyCategoryRepository implements PropertyCategoryInterface

{
    use CommonHelperTrait;
    private PropertyCategory $model;
    private CategoryWiseDocumentTemplate $cat_docu;

    public function __construct(PropertyCategory $model , CategoryWiseDocumentTemplate $cat_docu)
    {
        $this->model = $model;
        $this->cat_docu = $cat_docu;
    }

    public function index($request)
    {
        return PropertyCategory::all();
    }

    public function paginateData($request)
    {
        $limit = $request->input('limit',10);
        return $this->model->paginate($limit);
    }

    public function parents()
    {
        return $this->model->whereNull('parent_id')->get();
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
        return PropertyCategory::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $categoryStore                          = new $this->model;
            $categoryStore->name                    = $request->name;
            $categoryStore->status                  = $request->status;
            $categoryStore->parent_id               = $request->parent_id;
            $categoryStore->is_featured             = $request->is_featured;
            $categoryStore->image_id                = $this->UploadImageCreate($request->image, 'backend/uploads/categories');
            $categoryStore->icon_class                = $request->icon_class;
            // $categoryStore->icon_id                 = $this->UploadIconCreate($request->icon, 'backend/uploads/categories/icons');
            $categoryStore->save();
            if($request->doc_name){
                foreach($request->doc_name as $key => $document){
                    $new = new $this->cat_docu;
                    $new->name = Str::slug($document);
                    $new->label = $request->doc_label[$key];
                    $new->placeholder = $request->doc_placeholder[$key];
                    $new->file_type = $request->doc_file_type[$key];
                    $new->is_required = $request->doc_is_required[$key];
                    $new->category_id = $categoryStore->id;
                    $new->save();
                }
            }
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function show($id)
    {
        return $this->model->with('documents')->find($id);
    }

    public function update($request, $id)
    {
        try {
            $categoryUpdate                         = $this->model->findOrfail($id);
            $categoryUpdate->name                    = $request->name;
            $categoryUpdate->status                  = $request->status;
            $categoryUpdate->parent_id               = $request->parent_id;
            $categoryUpdate->is_featured             = $request->is_featured;
            $categoryUpdate->image_id               = $this->UploadImageUpdate($request->image, 'backend/uploads/categories', $categoryUpdate->image_id);
            $categoryUpdate->icon_class                = $request->icon_class;
            // $categoryUpdate->icon_id               = $this->UploadIconUpdate($request->icon, 'backend/uploads/categories/icons', $categoryUpdate->icon_id);
            $categoryUpdate->save();

            if($request->doc_name){
                if($request->ids){
                    foreach($request->ids as $key => $id){
                        $update = $this->cat_docu->find($id);
                        $update->name = Str::slug($request->doc_name[$key]); ;
                        $update->label = $request->doc_label[$key];
                        $update->placeholder = $request->doc_placeholder[$key];
                        $update->file_type = $request->doc_file_type[$key];
                        $update->is_required = $request->doc_is_required[$key];
                        $update->active_status = $request->doc_active_status[$key];
                        $update->save();
                    }
                }

                $already_added  = $request->ids ? count($request->ids) : 0 ;

                foreach($request->doc_name as $key => $document){
                   if($key > $already_added){
                        $new = new $this->cat_docu;
                        $new->name = $request->doc_name[$key];
                        $new->label = $request->doc_label[$key];
                        $new->placeholder = $request->doc_placeholder[$key];
                        $new->file_type = $request->doc_file_type[$key];
                        $new->is_required = $request->doc_is_required[$key];
                        $new->category_id = $categoryUpdate->id;
                        $new->save();
                   }

                }
            }
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $categoryDestroy   = $this->model->find($id);
            dd($categoryDestroy);
            if (!empty($categoryDestroy->image_id)){
                $this->UploadImageDelete($categoryDestroy->image_id); // delete image & record
            }
            if (!empty($categoryDestroy->icon_id)){
                $this->UploadIconDelete($categoryDestroy->icon_id); // delete image & record
            }
            $categoryDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


}
