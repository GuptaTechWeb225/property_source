<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\TimeSlotRequest;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = _trans('landlord.Time Slot');
        $data['timeslots'] =  TimeSlot::query()->latest('id')
            ->paginate($request->input('limit', 10));
        return view('backend.timeslot.index')->with($data);
    }


    public function create()
    {
        $data['title'] = _trans('common.Add new time slot');
        return view('backend.timeslot.create')->with($data);
    }


    public function store(TimeSlotRequest $request)
    {
        try{
            $data = $request->except('_token');
            TimeSlot::create($data);
            return redirect()->route('backend.timeslot.index')->with('success', _trans('alert.Your submission is completed'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


    public function edit($id)
    {
        $data['title'] = _trans('common.Edit time slot');
        $data['timeslot'] = TimeSlot::findOrFail($id);
        return view('backend.timeslot.edit')->with($data);
    }


    public function update(Request $request, $id)
    {
        try{
            $appointment = TimeSlot::findOrFail($id);
            $data = $request->except(['_token','_method']);
            $appointment->update($data);
            return redirect()->route('backend.timeslot.index')->with('success', _trans('alert.Updated successfully'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', _trans('alert.Something went wrong!'));
        }
    }
    public function destroy($id)
    {
        try {
            $appointment   = TimeSlot::find($id);
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
