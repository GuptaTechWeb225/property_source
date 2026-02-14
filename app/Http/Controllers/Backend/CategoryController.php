<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CategoryInterface;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;

class CategoryController extends Controller
{
    private $category;
    private $permission;

    function __construct(CategoryInterface $categoryInterface, PermissionInterface $permissionInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->category   = $categoryInterface;
        $this->permission = $permissionInterface;
    }

    public function index()
    {

        $data['categories']  = $this->category->getAll();
        $data['title']      = _trans('common.categories');
        return view('backend.categories.index', compact('data'));
    }

    public function create()
    {

        $data['title']       = _trans('common.create_category');
        $data['permissions'] = $this->permission->all();
        return view('backend.categories.create', compact('data'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $result = $this->category->store($request);
        if ($result) {
            return redirect()->route('categories.index')->with('success', _trans('alert.category_created_successfully'));
        }
        return redirect()->route('categories.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['category']    = $this->category->show($id);
        $data['title']       = _trans('common.categories');
        $data['permissions'] = $this->permission->all();
        return view('backend.categories.edit', compact('data'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $result = $this->category->update($request, $id);
        if ($result) {
            return redirect()->route('categories.index')->with('success', _trans('alert.category_updated_successfully'));
        }
        return redirect()->route('categories.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->category->destroy($id)) :
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
