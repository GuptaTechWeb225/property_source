<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategory\BlogCategoryStoreRequest;
use App\Http\Requests\BlogCategory\BlogCategoryUpdateRequest;
use App\Interfaces\BlogCategoriesInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class BlogsCategoryController extends Controller
{
    private $blogCategories;

    function __construct(BlogCategoriesInterface $blogCategoriesInterface)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }

        $this->blogCategories = $blogCategoriesInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit  = $request->input('limit', 10);
        $data['title']              = _trans('common.blog_categories');
        $data['blogCategories']    = $this->blogCategories->paginateData($limit);

        return view('backend.blog-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = _trans('common.add_blog_category');

        return view('backend.blog-category.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryStoreRequest $request)
    {
        $result = $this->blogCategories->store($request);
        if ($result) {
            return redirect()->route('blogs.category.index')->with('success', _trans('alert.blogs_category_created_successfully'));
        }
        return redirect()->route('blogs.category.create')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['blogCategories']     = $this->blogCategories->show($id);
        $data['title']              = _trans('common.edit_blog_category');
        return view('backend.blog-category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $result = $this->blogCategories->update($request, $id);
        if ($result) {
            return redirect()->route('blogs.category.index')->with('success', _trans('alert.blogs_category_updated_successfully'));
        }
        return redirect()->route('blogs.category.edit')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if ($this->blogCategories->destroy($id)) :
            $success[0] = "Deleted Successfully";
            $success[1] = "Success";
            $success[2] = "Deleted";
        else :
            $success[0] = "Something went wrong, please try again.";
            $success[1] = 'error';
            $success[2] = "oops";
        endif;
        return response()->json($success);
    }
}
