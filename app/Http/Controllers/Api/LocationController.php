<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\Locations\Country;
use App\Models\Locations\Upazila;
use App\Models\Locations\District;
use App\Models\Locations\Division;
use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use App\Http\Resources\AreaCollection;
use App\Http\Resources\CitiesCollection;
use App\Http\Resources\DistrictCollection;
use App\Http\Resources\DivisionCollection;
use App\Http\Resources\CountriesCollection;

class LocationController extends Controller
{
    use ApiReturnFormatTrait;

//    public function getCities()
//    {
//        try {
//            $data = new CitiesCollection(District::orderBy('name', 'ASC')->get());
//            return $this->responseWithSuccess('City List', $data, 200);
//        } catch (\Throwable $th) {
//            return response()->json([
//                'result' => false,
//                'message' => "Something went wrong"
//            ]);
//        }
//    }

    //Get Countries
    public function getCountries()
    {
        try {
            $data = new CountriesCollection(Country::where('status', 1)->get());
            return $this->responseWithSuccess('Country List', $data, 200);

        } catch (\Throwable $th) {
            return response()->json([
                'result' => false,
                'message' => "Something went wrong"
            ]);
        }
    }


    public function getDivision(Request $request)
    {

        try {
            $data = new DivisionCollection(State::where('country_id', $request->country_id)->orderBy('name', 'ASC')->get());
            return $this->responseWithSuccess('Division List', $data, 200);

        } catch (\Throwable $th) {
            return response()->json([
                'result' => false,
                'message' => "Something went wrong"
            ]);
        }
    }

    public function getdistricts(Request $request)
    {
        try {
            $data = new DistrictCollection(City::where('state_id', $request->division_id)->orderBy('name', 'ASC')->get());
            return $this->responseWithSuccess('District List', $data, 200);

        } catch (\Throwable $th) {
            return response()->json([
                'result' => false,
                'message' => "Something went wrong"
            ]);
        }
    }

    public function getArea(Request $request)
    {
        try {
            $data = new AreaCollection(Upazila::where('district_id', $request->district_id)->orderBy('name', 'ASC')->get());
            return $this->responseWithSuccess('Area List', $data, 200);

        } catch (\Throwable $th) {
            return response()->json([
                'result' => false,
                'message' => "Something went wrong"
            ]);
        }
    }


    public function getStates(Request $request)
    {
        try {
            $states = State::query()
                ->where('country_id', $request->country_id)
                ->orderBy('name', 'ASC')
                ->get();
            $data = new DivisionCollection($states);
            return $this->successResponse('State List', $data, 200);

        } catch (\Throwable $th) {
           return $this->errorResponse($th->getMessage());
        }
    }


    public function getCities(Request $request)
    {
        try {
            $cities = City::query()
                ->where('country_id', $request->country_id)
                ->OrWhere('state_id', $request->state_id)
                ->orderBy('name', 'ASC')
                ->get();
            $data = new DistrictCollection($cities);
            return $this->successResponse('Cities List', $data, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

}
