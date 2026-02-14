<?php

namespace App\Repositories\Hrm;

use App\Interfaces\Hrm\DesignationInterface;
use App\Models\Hrm\Department;
use App\Models\Hrm\Designation;
use App\Traits\CommonHelperTrait;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class DesignationRepository.
 */
class DesignationRepository implements DesignationInterface
{
    use CommonHelperTrait;

    private $model;

    public function __construct(Designation $designation)
    {
        $this->model = $designation;
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
        return $this->model->when($field && $value, function ($q) use ($field, $value) {
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
            $store = new $this->model;
            $store->title = $request->title;
            $store->status = $request->status;
            $store->save();
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
            $update = $this->model->find($id);
            $update->title = $request->title;
            $update->status = $request->status;
            $update->save();
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
