<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Committee\CommitteeUpdateRequest;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Property\Property;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\Committee\CommitteeStoreRequest;
use App\Interfaces\CommitteeInterface;
use Psy\Util\Json;

class CommitteeController extends Controller
{

    private $committee;

    function __construct(CommitteeInterface $committeeInterface)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('committees')) {
            abort(400);
        }
        $this->committee        = $committeeInterface;
    }


    public function index()
    {
        $data['committees']  = $this->committee->getAll();
        $data['title'] = _trans('common.Committee');
        return view('backend.committee.index', compact('data'));
    }


    public function create()
    {
        $data['users'] = User::select('id','name')->get();
        $taken_properties = Committee::select('id', 'property_id')->get();
        $data['properties'] = Property::select('id', 'name')
            ->whereNotIn('id', $taken_properties->pluck('property_id'))
            ->get();
        $data['title'] = _trans('common.Committee');
        return view('backend.committee.create')->with($data);
    }


    public function store(CommitteeStoreRequest $request)
    {
        $result = $this->committee->store($request);
        if ($result) {
            return redirect()->route('committees.index')->with('success', _trans('alert.committee_created_successfully'));
        }
        return redirect()->route('committees.create')->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommitteeMember  $committeeMember
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['users'] = User::select('id','name')->get();
        $committee = $this->committee->show($id);
        $committee->load('members', 'members.user');
        $data['committee'] = $committee;
        $data['title'] = $committee->name . ' Committee';
        return view('backend.committee.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommitteeMember  $committeeMember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['users'] = User::select('id','name')->get();
        $data['properties'] = Property::select('id', 'name')->get();
        $committee = $this->committee->show($id);
        $data['committee']   = $committee->load('members');
        $data['title']       = _trans('common.committees');
        return view('backend.committee.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommitteeMember  $committeeMember
     * @return \Illuminate\Http\Response
     */
    public function update(CommitteeUpdateRequest $request, $id)
    {
        $result = $this->committee->update($request, $id);
        if ($result) {
            return redirect()->route('committees.index')->with('success', _trans('alert.committee_updated_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommitteeMember  $committeeMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->committee->destroy($id)) :
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
