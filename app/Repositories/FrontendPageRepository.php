<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Models\FrontendPage;
use App\Traits\CommonHelperTrait;
use App\Interfaces\FrontendPageInterface;

class FrontendPageRepository implements FrontendPageInterface

{

    use CommonHelperTrait;
    private Page $model;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    public function all($request)
    {
        return $this->model->when($request->has('keyword'), function($query) use ($request){
            $query->where('title', 'like', '%'. $request->keyword. '%');
        })->latest()->paginate(10);
    }

    public function allParent()
    {
        return $this->model->with('children')->whereNull('parent_id')->get();
    }

    public function allCount()
    {
        return $this->model->all()->count();
    }


    public function store($request)
    {
        try {
            $newPage = new $this->model;
            $newPage->user_id = auth()->id();
            $newPage->image_id = $this->UploadImageCreate($request->image, 'backend/uploads/frontend_page');
            $newPage->title = $request->title;
            $newPage->slug = Str::slug($request->title);
            $newPage->content = $request->content;
            $newPage->status = $request->status;
            $newPage->page_url = $request->page_url;
            $newPage->serial = $request->serial;
            $newPage->parent_id = $request->parent_id;
            $newPage->show_menu = $request->show_menu;
            $newPage->show_testimonial = $request->show_testimonial;
            $newPage->show_leadership = $request->show_leadership;
            $newPage->save();

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

            $newPage =  $this->model->find($id);
            $newPage->user_id = auth()->id();
            $newPage->image_id = $request->hasFile('image') ? $this->UploadImageCreate($request->image, 'backend/uploads/frontend_page') : $newPage->image_id;
            $newPage->title = $request->title;
            $newPage->slug = Str::slug($request->title);
            $newPage->content = $request->content;
            $newPage->status = $request->status;
            $newPage->serial = $request->serial;
            $newPage->page_url = $request->page_url;
            $newPage->parent_id = $request->parent_id;
            $newPage->show_menu = $request->show_menu;
            $newPage->show_testimonial = $request->show_testimonial;
            $newPage->show_leadership = $request->show_leadership;
            $newPage->save();
            Cache::forget('frontend_menus');
            Cache::forget('pages_list_cache');
            Cache::put('frontend_menus', frontendMenus());
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $page = $this->model->find($id);
            $this->UploadImageDelete($page->image_id); // delete image & record
            $page->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
