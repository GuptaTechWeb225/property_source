<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use App\Http\Requests\Appointment\StoreRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{


    public function store(StoreRequest $request)
    {
        try{
            $data = $request->except('_token');
            Appointment::create($data);
            return redirect()->back()->with('success', _trans('alert.Your submission is completed'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }
}
