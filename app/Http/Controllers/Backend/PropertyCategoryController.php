<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PropertyCategoryInterface;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\PermissionInterface;
use App\Http\Requests\PropertyCategory\PropertyCategoryStoreRequest;
use App\Http\Requests\PropertyCategory\PropertyCategoryUpdateRequest;

class PropertyCategoryController extends Controller
{
    private $category;
    private $permission;

    function __construct(PropertyCategoryInterface $propertyCategoryInterface, PermissionInterface $permissionInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->category   = $propertyCategoryInterface;
        $this->permission = $permissionInterface;
    }

    public function index(Request $request)
    {
        $data['collection']  = $this->category->paginateData($request);
        $data['title']      = _trans('common.categories');
        return view('backend.property-category.index')->with($data);
    }

    public function create()
    {
        $data['title']       = _trans('common.create_category');
        $data['permissions'] = $this->permission->all();
        $data['parents'] = $this->category->parents();
        return view('backend.property-category.create')->with($data);
    }

    public function store(PropertyCategoryStoreRequest $request)
    {

        $result = $this->category->store($request);
        if ($result) {
            return redirect()->route('properties.categories.index')->with('success', _trans('alert.category_created_successfully'));
        }
        return redirect()->route('properties.categories.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['category']    = $this->category->show($id);
        $data['title']       = _trans('common.categories');
        $data['permissions'] = $this->permission->all();
        $data['parents'] = $this->category->parents();
        return view('backend.property-category.edit')->with($data);
    }

    public function update(PropertyCategoryUpdateRequest $request, $id)
    {
       
        $result = $this->category->update($request, $id);
        if ($result) {
            return redirect()->route('properties.categories.index')->with('success', _trans('alert.category_updated_successfully'));
        }
        return redirect()->route('properties.categories.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
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
