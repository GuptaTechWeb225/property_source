<?php

namespace App\Http\Controllers\Backend;

use App\Enums\ApprovalStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Appointment\StoreRequest;
use App\Models\Advertisement;
use App\Models\Appointment;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = _trans('landlord.Appointment');
        $data['appointments'] =  Appointment::with('timeSlot:id,start_time,end_time','property:id,name')
            ->latest('date')
            ->paginate($request->input('limit', 10));
        return view('backend.appointment.index')->with($data);
    }


    public function create()
    {
        $data['title'] = _trans('common.Appointment Create');
        $data['timeslots'] = TimeSlot::select('id','start_time','end_time')->where('status', 'active')->get();
        $data['properties'] = Advertisement::with('property:id,name')
            ->where('status', 1)
            ->where('approval_status', ApprovalStatus::APPROVED)
            ->whereDoesntHave('orders', function ($query) {
                $query->whereIn('status', ['pending', 'approved']);
            })->get()
            ->pluck('property');

        return view('backend.appointment.create')->with($data);
    }


    public function store(StoreRequest $request)
    {
        try{
            $data = $request->except('_token');
            Appointment::create($data);
            return redirect()->route('backend.appointment.index')->with('success', _trans('alert.Your submission is completed'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', _trans('alert.Something went wrong!'));
        }
    }


    public function edit($id)
    {
        $data['title'] = _trans('common.Appointment Create');
        $data['appointment'] = Appointment::findOrFail($id);
        $data['timeslots'] = TimeSlot::select('id','start_time','end_time')->where('status', 'active')->get();
        $data['properties'] = Advertisement::with('property:id,name')
            ->where('status', 1)
            ->where('approval_status', ApprovalStatus::APPROVED)
            ->whereDoesntHave('orders', function ($query) {
                $query->whereIn('status', ['pending', 'approved']);
            })->get()
            ->pluck('property');

        return view('backend.appointment.edit')->with($data);
    }


    public function update(Request $request, $id)
    {
        try{
            $appointment = Appointment::findOrFail($id);
            $data = $request->except(['_token','_method']);
            $appointment->update($data);
            return redirect()->route('backend.appointment.index')->with('success', _trans('alert.Updated successfully'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', _trans('alert.Something went wrong!'));
        }
    }
    public function destroy($id)
    {
        try {
            $appointment   = Appointment::find($id);
            if ($appointment->delete()):
                $success[0] = "Deleted Successfully";
                $success[1] = "Success";
                $success[2] = "Deleted";
            else :
                $success[0] = "Something went wrong, please try again.";
                $success[1] = 'error';
                $success[2] = "oops";
            endif;
            return response()->json($success);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
