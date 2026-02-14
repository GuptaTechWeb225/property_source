<?php

namespace App\Http\Controllers;

use App\Interfaces\CountryInterface;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\Country\CountryStoreRequest;
use App\Http\Requests\Country\CountryUpdateRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private $country;

    function __construct(CountryInterface $countryInterface)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }

        $this->country   = $countryInterface;

    }

    public function index(Request $request)
    {

        $data['countries']  = $this->country->getAll($request);
        $data['title']      = _trans('common.Countries');
        return view('backend.country.index', compact('data'));
    }

    public function create()
    {
        $data['title']       = _trans('common.create_country');
        return view('backend.country.create', compact('data'));
    }

    public function store(CountryStoreRequest $request)
    {
        $result = $this->country->store($request);
        if ($result) {
            return redirect()->route('countries.index')->with('success', _trans('alert.country_created_successfully'));
        }
        return redirect()->route('countries.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['country']    = $this->country->show($id);
        $data['title']       = _trans('common.countries');
        return view('backend.country.edit', compact('data'));
    }

    public function update(CountryUpdateRequest $request, $id)
    {
        $result = $this->country->update($request, $id);
        if ($result) {
            return redirect()->route('countries.index')->with('success', _trans('alert.country_updated_successfully'));
        }
        return redirect()->route('countries.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->country->destroy($id)) :
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