<?php

namespace App\Repositories;

use App\Interfaces\BlogCategoriesInterface;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoriesRepository implements BlogCategoriesInterface
{

    private $model;

    public function __construct(BlogCategory $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return BlogCategory::all();
    }

    public function paginateData($limit = 10)
    {
        return BlogCategory::latest('id')->paginate($limit);
    }

    public function activeAll()
    {
        return BlogCategory::where('status', 1)->get();
    }

    public function getAll()
    {
        return BlogCategory::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $BlogCategoriesStore = new $this->model;
            $BlogCategoriesStore->title = $request->title;
            $BlogCategoriesStore->slug = str::slug($request->title);
            $BlogCategoriesStore->status = $request->status;
            $BlogCategoriesStore->save();
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
            $BlogCategoriesUpdate = $this->model->findOrfail($id);
            $BlogCategoriesUpdate->title = $request->title;
            $BlogCategoriesUpdate->slug = str::slug($request->title);
            $BlogCategoriesUpdate->status = $request->status;
            $BlogCategoriesUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $BlogCategoriesDestroy = $this->model->find($id);
            $BlogCategoriesDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
