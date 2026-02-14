<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommitteeMember\StoreRequest;
use App\Http\Requests\CommitteeMember\UpdateRequest;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\CommitteeMemberInterface;

class CommitteeMemberController extends Controller
{
    private $committeeMember;

    function __construct(CommitteeMemberInterface $committeeMemberInterface)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('committee_members')) {
            abort(400);
        }
        $this->committeeMember        = $committeeMemberInterface;
    }

    public function store(StoreRequest $request)
    {
        $result = $this->committeeMember->store($request);
        if ($result) {
            return redirect()->back()->with('success', _trans('alert.committee_member_created_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        if ($this->committeeMember->destroy($id)) :
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
