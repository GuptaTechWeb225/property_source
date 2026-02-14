<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Traits\CommonHelperTrait;
use App\Interfaces\BlogsInterface;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class BlogsRepository implements BlogsInterface{

    use CommonHelperTrait;
    private $blogs;
    private $blogCategories;

    public function __construct(Blog $blog, BlogCategory $BlogCategories)
    {
        $this->blogs            = $blog;
        $this->blogCategories   = $BlogCategories;
    }

    public function index()
    {
        return Blog::all();
    }

    public function all()
    {
        $data['blogs']          = Blog::all();
        $data['blogCategories'] = BlogCategory::where('status', 1)->get();

        return $data;
    }


    public function paginateData($limit = 10)
    {
       return Blog::latest('id')->paginate($limit);
    }

    public function store($request)
    {
        try {
            $blogStore               = new $this->blogs;
            $blogStore->title        = $request->title;
            $blogStore->content      = $request->content;
            $blogStore->image_id     = $this->UploadImageCreate($request->image, 'backend/uploads/blogs');
            $blogStore->category_id  = $request->category;
            $blogStore->case_study_id  = $request->case_study;
            $blogStore->slug         = str::slug($request->title);
            $blogStore->tags         = $request->tags;
            $blogStore->status       = $request->status;
            $blogStore->save();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function show($id){
        return $this->blogs->find($id);
    }

    public function update($request,$id){
        try {
            $blogUpdate                         = $this->blogs->findOrfail($id);
            $blogUpdate->title                  = $request->title;
            $blogUpdate->content                = $request->content;
            $blogUpdate->image_id               = $this->UploadImageUpdate($request->image, 'backend/uploads/blogs', $blogUpdate->image_id);
            $blogUpdate->category_id            = $request->category;
            $blogUpdate->case_study_id          = $request->case_study;
            $blogUpdate->slug                    = str::slug($request->title);
            $blogUpdate->tags                    = $request->tags;
            $blogUpdate->status                 = $request->status;
            $blogUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $blogDestroy   = $this->blogs->find($id);
            $blogDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

}
