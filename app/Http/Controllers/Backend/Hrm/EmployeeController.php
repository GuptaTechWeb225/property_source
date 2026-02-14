<?php

namespace App\Http\Controllers\Backend\Hrm;

use App\Http\Controllers\Controller;
use App\Interfaces\Hrm\DepartmentInterface;
use App\Interfaces\Hrm\DesignationInterface;
use App\Interfaces\Hrm\EmployeeInterface;
use App\Models\Hrm\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\Hrm\Employee\StoreRequest;
use App\Http\Requests\Hrm\Employee\UpdateRequest;

class EmployeeController extends Controller
{
    protected EmployeeInterface $repository;
    protected $view_page = 'employee';
    protected $page_title = 'Employees';
    protected  $route = 'employee';
    protected  $designation;
    protected  $department;

    public function __construct(EmployeeInterface $repository, DesignationInterface $designation, DepartmentInterface $department)
    {
        $this->repository = $repository;
        $this->designation = $designation;
        $this->department = $department;
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
        $data['departments'] = $this->department->all();
        $data['designations'] = $this->designation->all();
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
        $data['employee'] = $this->repository->show($id);
        $data['departments'] = $this->department->all();
        $data['designations'] = $this->designation->all();
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
