<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Category;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\CategoryInterface;
use App\Interfaces\CityInterface;
use App\Models\Locations\City;
use App\Models\Locations\Country;

//use Your Model

/**
 * Class CategoryRepository.
 */
class CityRepository implements CityInterface
{
    use CommonHelperTrait;
    private City $model;

    public function __construct(City $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return City::all();
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
        return City::with(['country', 'state'])

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
            $cityStore                         = new $this->model;
            $cityStore->name                   = $request->name;
            $cityStore->country_id             = $request->country_id;
            $cityStore->state_id               = $request->state_id;
            $cityStore->status                 = $request->status;
            $cityStore->save();
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
            $cityUpdate                         = $this->model->findOrfail($id);
            $cityUpdate->name                   = $request->name;
            $cityUpdate->country_id             = $request->country_id;
            $cityUpdate->state_id               = $request->state_id;
            $cityUpdate->status                 = $request->status;
            $cityUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $cityDestroy   = $this->model->find($id);
            $cityDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getCountriesWithStates()
    {
        return Country::with('states:id,name,country_id')->select('id', 'name')->get();
    }
}
