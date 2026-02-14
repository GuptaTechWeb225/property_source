<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogStoreRequest;
use App\Http\Requests\Blog\BlogUpdateRequest;
use App\Interfaces\BlogsInterface;
use App\Interfaces\BlogCategoriesInterface;
use App\Repositories\CaseStudyRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    private $blogs;
    private $blogCategory;
    private $case_study_repo;

    function __construct(BlogsInterface $blogsInterface, BlogCategoriesInterface $blogCategory , CaseStudyRepository $case_study_repo)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }

        $this->blogs        = $blogsInterface;
        $this->blogCategory = $blogCategory;
        $this->case_study_repo = $case_study_repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10);
        $data['title']       = _trans('common.blogs');
        $data['blogs']       = $this->blogs->paginateData($limit);

        return view('backend.blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']       = _trans('common.create_blog');
        $data['blogs']       = $this->blogs->all();
        $data['blogCategories']    = $this->blogCategory->activeAll();
        $data['case_studies']    = $this->case_study_repo->all();

        return view('backend.blogs.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {

        $result = $this->blogs->store($request);
        if ($result) {
            return redirect()->route('blogs.index')->with('success', _trans('alert.blog_created_successfully'));
        }
        return redirect()->route('blogs.create')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']   = _trans('common.edit_blog');
        $data['blog']    = $this->blogs->show($id);
        $data['blogCategories']    = $this->blogCategory->activeAll();
        $data['case_studies']    = $this->case_study_repo->all();
        return view('backend.blogs.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, $id)
    {
        $result = $this->blogs->update($request, $id);
        if ($result) {
            return redirect()->route('blogs.index')->with('success', _trans('alert.blog_updated_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if ($this->blogs->destroy($id)) :
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
