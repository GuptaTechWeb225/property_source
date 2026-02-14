<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Category;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\CategoryInterface;
use App\Interfaces\CountryInterface;
use App\Models\Locations\Country;

//use Your Model

/**
 * Class CategoryRepository.
 */
class CountryRepository implements CountryInterface
{
    use CommonHelperTrait;
    private Country $model;

    public function __construct(Country $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return Country::all();
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
        return Country::when($request->has('search_text'), function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->search_text}%")
                ->orWhere('currency', 'LIKE', "%{$request->search_text}%")
                ->orWhere('currency_name', 'LIKE', "%{$request->search_text}%");
        })->latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $countryStore                         = new $this->model;
            $countryStore->iso2                   = $request->code;
            $countryStore->name                   = $request->name;
            $countryStore->currency               = $request->currency;
            $countryStore->currency_symbol        = $request->currency_symbol;
            $countryStore->currency_name          = $request->currency_name;
            $countryStore->status                 = $request->status;
            $countryStore->save();
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
            $countryUpdate                         = $this->model->findOrfail($id);
            $countryUpdate->iso2                   = $request->code;
            $countryUpdate->name                   = $request->name;
            $countryUpdate->currency               = $request->currency;
            $countryUpdate->currency_symbol        = $request->currency_symbol;
            $countryUpdate->currency_name          = $request->currency_name;
            $countryUpdate->status                 = $request->status;
            $countryUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $countryDestroy   = $this->model->find($id);
            $countryDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}