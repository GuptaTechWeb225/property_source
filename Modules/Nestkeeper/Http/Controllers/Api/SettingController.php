<?php

namespace Modules\Nestkeeper\Http\Controllers\Api;

use Throwable;
use Illuminate\Http\Request;
use App\Models\BillingAddress;
use App\Models\Locations\Country;
use App\Models\Locations\Upazila;
use App\Models\Locations\District;
use App\Models\Locations\Division;
use Illuminate\Routing\Controller;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Contracts\Support\Renderable;
use Modules\Nestkeeper\Http\Requests\Settings\StoreRequest;

class SettingController extends Controller
{
    use ApiReturnFormatTrait;

    public function create(Request $request)
    {

        try {
            $data['country']                 = Country::find(1);

            $data['divisions'] = [];
            if ($request->country) {
                $data['divisions']            = Division::where('country_id', $request->country)->get();
            }

            $data['districts']                = [];
            if ($request->division) {
                $data['districts']            = District::where('division_id', $request->division)->get();
            }

            $data['upazilas']                = [];
            if ($request->district) {
                $data['upazilas']            = Upazila::where(['division_id' => $request->division, 'district_id' => $request->district])->get();
            }

            return $this->responseWithSuccess('List found', $data, 200);
        } catch (Throwable $e) {

            return $this->responseExceptionError(_trans('nestkeeper.Something went wrong!!'));
        }
    }


    // store
    public function store(StoreRequest $request)
    {

        try {

            // $checkExists   = BillingAddress::where('user_id',Auth()->user()->id)->first();
            // if($checkExists){
            //     $target = $checkExists;
            //     $type = "Update";
            // }else{
            //     $target = new BillingAddress();
            //     $type = "Added";
            // }

            $target                     = new BillingAddress();
            $target->user_id            = Auth()->user()->id;
            $target->address            = $request->address;
            $target->email              = NULL;
            $target->country_id         = $request->country_id;
            $target->division_id        = $request->division_id;
            $target->district_id        = $request->district_id;
            $target->upazila_id         = $request->upazila_id;
            $target->postal             = $request->postal;
            $target->save();

            $data['messages'] = "Settings Added Successfully";
            return $this->responseWithSuccess($data['messages'], 200);

        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }

    // index
    public function index()
    {
        try {
            $user = auth()->user()->id;

            $target  =   BillingAddress::where('user_id', $user)->with(['country:id,name', 'division:id,name', 'district:id,name', 'upazila:id,name'])->get();

            $data['messages'] = 'Data Found';
            return $this->responseWithSuccess($data['messages'], $target);
        } catch (\Throwable $th) {
            return $this->responseExceptionError($th->getMessage(), $th->getTrace(), 500);
        }
    }
}
