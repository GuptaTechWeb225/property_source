<?php

namespace App\Repositories;


use App\Traits\CommonHelperTrait;
use App\Interfaces\StateInterface;
use App\Models\Locations\Country;
use App\Models\Locations\State;

//use Your Model

/**
 * Class CategoryRepository.
 */
class StateRepository implements StateInterface
{
    use CommonHelperTrait;
    private State $model;

    public function __construct(State $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return State::with('country')->all();
    }

    public function status($request)
    {
        return $this->model->whereIn('id', $request->ids)->update(['status' => $request->status]);
    }

    public function deletes($request)
    {
        return $this->model->destroy((array)$request->ids);
    }

    public function getAll($request)
    {
        return State::with('country')
            ->when($request->has('country_id'), function ($query) use ($request) {
                $query->where('country_id', $request->country_id);
            })
            ->when($request->has('state_id'), function ($query) use ($request) {
                $query->where('state_id', $request->state_id);
            })
            ->when($request->has('search_text'), function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . strtolower($request->input('search_text')) . '%');
            })
            ->latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $stateStore                         = new $this->model;
            $stateStore->iso2                   = $request->code;
            $stateStore->name                   = $request->name;
            $stateStore->country_id             = $request->country_id;
            $stateStore->status                 = $request->status;
            $stateStore->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($request, $id)
    {
        try {
            $stateUpdate                         = $this->model->findOrfail($id);
            $stateUpdate->iso2                   = $request->code;
            $stateUpdate->name                   = $request->name;
            $stateUpdate->country_id             = $request->country_id;
            $stateUpdate->status                 = $request->status;
            $stateUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $stateDestroy   = $this->model->find($id);
            $stateDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getAllCountries()
    {
        return Country::select('id', 'name')->get();
    }
}