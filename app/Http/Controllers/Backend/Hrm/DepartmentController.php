<?php

namespace App\Http\Controllers\Backend\Hrm;

use App\Http\Requests\Hrm\Department\StoreRequest;
use App\Http\Requests\Hrm\Department\UpdateRequest;
use App\Interfaces\Hrm\DepartmentInterface;
use App\Models\Hrm\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Hrm\DepartmentRepository;

class DepartmentController extends Controller
{
    protected DepartmentInterface $repository;
    protected $view_page = 'department';
    protected $page_title = 'Departments';
    protected  $route = 'department';
    public function __construct(DepartmentInterface $repository)
    {
        $this->repository = $repository;
    }


    public function index(Request $request)
    {
        $data['collection'] = $this->repository->paginateData($request);
        $data['title'] = _trans("common.{$this->page_title}");
        return view("backend.hrm.{$this->view_page}.index")->with($data);
    }


    public function create()
    {
        $data['title'] = _trans("common.Add {$this->page_title}");
        return view("backend.hrm.{$this->view_page}.create")->with($data);
    }

    public function store(StoreRequest $request)
    {
        try {
            $this->repository->store($request);
            return redirect()->route($this->route.'.index')->with('success',_trans('alert.Created successfully!'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger',$th->getMessage());
        }
    }

    public function edit($id)
    {
        $data['title'] = _trans("common.Edit {$this->page_title}");
        $data['department'] = $this->repository->show($id);
        return view("backend.hrm.{$this->view_page}.edit")->with($data);
    }


    public function update(UpdateRequest $request, $id)
    {
        try {
            $this->repository->update($request,$id);
            return redirect()->route($this->route.'.index')->with('success',_trans('alert.Updated Successfully!'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger',$th->getMessage());
        }
    }



    public function destroy($id)
    {
        if ($this->repository->destroy($id)) :
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
