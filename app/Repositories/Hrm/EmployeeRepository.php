<?php

namespace App\Repositories\Hrm;

use App\Interfaces\Hrm\EmployeeInterface;
use App\Models\Hrm\Designation;
use App\Models\Hrm\Employee;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Hash;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class EmployeeRepository.
 */
class EmployeeRepository implements EmployeeInterface
{
    use CommonHelperTrait;

    private $model;
    private  $role_id = 6;

    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function paginateData($request)
    {
        $limit = $request->input('limit', 10);
        $field = $request->input('field');
        $value = $request->input('value');
        return $this->model->where('role_id', $this->role_id)
            ->when($field && $value, function ($q) use ($field, $value) {
            $q->where($field, 'like', "%$value%");
        })->latest('id')->paginate($limit);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function store($request)
    {
        try {
            $data = new $this->model;
            $data->role_id = $this->role_id;
            $data->name = $request->input('name');
            $data->department_id = $request->input('department_id');
            $data->designation_id = $request->input('designation_id');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone');
            $data->password = Hash::make($request->input('password'));
            $data->confirm_password = Hash::make($request->input('password_confirmation'));
            $data->image_id = $this->UploadImageCreate($request->file('image'), 'backend/uploads/employee') ?? null;
            $data->save();
            return true;
        } catch (\Exception $exception) {
            return throw $exception;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($request, $id)
    {
        try {
            $data                   = $this->model->find($id);
            $data->role_id          = $this->role_id;
            $data->name             = $request->input('name');
            $data->department_id    = $request->input('department_id');
            $data->designation_id   = $request->input('designation_id');
            $data->email            = $request->input('email');
            $data->phone            = $request->input('phone');
            $data->password         = Hash::make($request->input('password'));
            $data->confirm_password = Hash::make($request->input('password_confirmation'));
            $data->image_id         = $this->UploadImageUpdate($request->file('image'), 'backend/uploads/employee',$data->image_id) ?? null;
            $data->save();
            return true;
        } catch (\Exception $exception) {
            return throw $exception;
        }
    }

    public function destroy($id)
    {
        try {
            $data   = $this->model->find($id);
            $data->delete();
            return true;
        } catch (\Throwable $th) {
            return throw $th;
        }
    }
}
