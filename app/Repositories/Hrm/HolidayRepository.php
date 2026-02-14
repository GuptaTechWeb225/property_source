<?php

namespace App\Repositories\Hrm;

use App\Interfaces\Hrm\HolidayInterface;
use App\Models\Hrm\Holiday;
use App\Models\Hrm\LeaveType;
use App\Traits\CommonHelperTrait;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class HolidayRepository.
 */
class HolidayRepository implements HolidayInterface
{
    use CommonHelperTrait;

    private $model;

    public function __construct(Holiday $holiday)
    {
        $this->model = $holiday;
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
            $data = new $this->model;
            $data->name = $request->input('name');
            $data->status = $request->input('status');
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
            $data->name             = $request->input('name');
            $data->status           = $request->input('status');
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
