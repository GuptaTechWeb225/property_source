<?php

namespace App\Http\Controllers;


use App\Interfaces\CityInterface;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\City\CityStoreRequest;
use App\Http\Requests\City\CityUpdateRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private $city;

    function __construct(CityInterface $cityInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->city   = $cityInterface;
    }

    public function index(Request $request)
    {
        $data['cities']  = $this->city->getAll($request);
        $data['countries'] = $this->city->getCountriesWithStates();
        $data['title']      = _trans('common.Cities');

        return view('backend.city.index', compact('data'));
    }

    public function create()
    {

        $data['title']       = _trans('common.create_city');
        $data['countries'] = $this->city->getCountriesWithStates();
        return view('backend.city.create', compact('data'));
    }

    public function store(CityStoreRequest $request)
    {
        $result = $this->city->store($request);
        if ($result) {
            return redirect()->route('cities.index')->with('success', _trans('alert.city_created_successfully'));
        }
        return redirect()->route('cities.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['city']    = $this->city->show($id);
        $data['countries'] = $this->city->getCountriesWithStates();
        $data['title']       = _trans('common.cities');
        return view('backend.city.edit', compact('data'));
    }

    public function update(CityUpdateRequest $request, $id)
    {
        $result = $this->city->update($request, $id);
        if ($result) {
            return redirect()->route('cities.index')->with('success', _trans('alert.city_updated_successfully'));
        }
        return redirect()->route('cities.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->city->destroy($id)) :
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