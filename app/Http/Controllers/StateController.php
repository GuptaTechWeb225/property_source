<?php

namespace App\Http\Controllers;


use App\Interfaces\StateInterface;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\State\StateStoreRequest;
use App\Http\Requests\State\StateUpdateRequest;
use App\Models\Locations\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
    private $state;

    function __construct(StateInterface $stateInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->state   = $stateInterface;
    }

    public function index(Request $request)
    {

        $data['states']  = $this->state->getAll($request);
        $data['countries'] =  $this->state->getAllCountries();
        $data['title']      = _trans('common.States');
        return view('backend.state.index', compact('data'));
    }

    public function create()
    {

        $data['title']       = _trans('common.create_state');
        $data['countries'] =  $this->state->getAllCountries();
        
        return view('backend.state.create', compact('data'));
    }

    public function store(StateStoreRequest $request)
    {
        $result = $this->state->store($request);
        if ($result) {
            return redirect()->route('states.index')->with('success', _trans('alert.state_created_successfully'));
        }
        return redirect()->route('states.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function edit($id)
    {
        $data['state']    = $this->state->show($id);
        $data['countries'] =  $this->state->getAllCountries();
        $data['title']       = _trans('common.states');
        return view('backend.state.edit', compact('data'));
    }

    public function update(StateUpdateRequest $request, $id)
    {
        $result = $this->state->update($request, $id);
        if ($result) {
            return redirect()->route('states.index')->with('success', _trans('alert.state_updated_successfully'));
        }
        return redirect()->route('states.index')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    public function delete($id)
    {
        if ($this->state->destroy($id)) :
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