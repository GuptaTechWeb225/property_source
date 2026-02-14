<?php

namespace App\Repositories;

use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Traits\CommonHelperTrait;
use App\Interfaces\CommitteeInterface;
use App\Interfaces\CommitteeMemberInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

//use Your Model

/**
 * Class CategoryRepository.
 */
class CommitteeMemberRepository implements CommitteeMemberInterface
{
    use CommonHelperTrait;
    private CommitteeMember $model;

    public function __construct(CommitteeMember $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return CommitteeMember::all();
    }

    public function status($request)
    {
        return $this->model->whereIn('id', $request->ids)->update(['status' => $request->status]);
    }

    public function deletes($request)
    {
        return $this->model->destroy((array)$request->ids);
    }

    public function getAll()
    {
        return CommitteeMember::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $member_type  = $request->input('member_type');
            $committee_id  = $request->input('committee_id');
            $committee = Committee::find($committee_id);
            $committeeMember = CommitteeMember::where('committee_id',$committee_id)
                ->where('member_type', 'is_president')
                ->first();
            if ($member_type == 'is_president' && !empty($committeeMember) ){
                $committeeMember->member_type = 'is_general';
                $committeeMember->save();
            }
            if ($member_type == 'is_admin') {
                $committee->total_admin += 1;
            }

            // Store Member data
            $storeData                         = new $this->model;
            $storeData->committee_id           = $request->committee_id;
            $storeData->user_id                = $request->user_id;
            $storeData->member_type            = $member_type;

            $storeData->save();
            $committee->total_member +=1;
            $committee->save();
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $member_type  = $request->input('member_type');
            $committee_id  = $request->input('committee_id');
            $committee = Committee::find($committee_id);
            $committeeMember = CommitteeMember::where('committee_id',$committee_id)
                ->where('member_type', 'is_president')
                ->first();
            if ($member_type == 'is_president' && !empty($committeeMember) ){
                $committeeMember->member_type = 'is_general';
                $committeeMember->save();
            }
            if ($member_type == 'is_admin') {
                $committee->total_admin += 1;
            }

            // Store Member data
            $storeData                         = $this->model->find($id);
            $storeData->committee_id           = $request->committee_id;
            $storeData->user_id                = $request->user_id;
            $storeData->member_type            = $member_type;

            $storeData->save();
            $committee->total_member +=1;
            $committee->save();
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $committeeDestroy   = $this->model->find($id);
            $committeeDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
