<?php

namespace App\Repositories;

use App\Models\CommitteeMember;
use App\Traits\CommonHelperTrait;
use App\Interfaces\CommitteeInterface;
use App\Models\Committee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

//use Your Model

/**
 * Class CategoryRepository.
 */
class CommitteeRepository implements CommitteeInterface
{
    use CommonHelperTrait;

    private Committee $model;

    public function __construct(Committee $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        return Committee::all();
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
        return Committee::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $committeeStore = new $this->model;
            $committeeStore->property_id = $request->property_id;
            $committeeStore->name = $request->name;
            $committeeStore->email = $request->email;
            $committeeStore->phone = $request->phone;
            $committeeStore->total_member = $request->total_member;
            $committeeStore->total_admin = $request->total_admin;
            $committeeStore->status = $request->status;
            $committeeStore->logo_id = $this->UploadImageCreate($request->logo, 'backend/uploads/committee');
            $committeeStore->save();
            if ($committeeStore) {
                $this->storeMember($request, $committeeStore);
            }
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
            $committeeUpdate = $this->model->findOrfail($id);
            $committeeUpdate->property_id = $request->property_id;
            $committeeUpdate->name = $request->name;
            $committeeUpdate->email = $request->email;
            $committeeUpdate->phone = $request->phone;
            $committeeUpdate->total_member = $request->total_member;
            $committeeUpdate->total_admin = $request->total_admin;
            $committeeUpdate->status = $request->status;
            $committeeUpdate->logo_id = $this->UploadImageUpdate($request->logo, 'backend/uploads/committee', $committeeUpdate->logo_id);
            $committeeUpdate->save();
            if ($committeeUpdate) {
                $this->updateMember($request, $committeeUpdate);
            }
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
            $committeeDestroy = $this->model->find($id);
            $committeeDestroy->members()->delete();
            $this->UploadImageDelete($committeeDestroy->logo_id); // delete image & record
            $committeeDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


    private function storeMember($request, $committee)
    {
        try {
            foreach ($request->member_id as $key => $member_id) {
                $updateData = [
                    'committee_id' => $committee->id,
                    'user_id' => $member_id,
                    'member_type' => $request->member_type[$key]
                ];
                $committee->total_member += 1;
                if ($request->member_type[$key] == 'is_admin') {
                    $committee->total_admin += 1;
                }
                $committee->save();
                CommitteeMember::create($updateData);
            }
            return true;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    private function updateMember($request, $committee)
    {
        try {
            $committeeMember = CommitteeMember::where('committee_id', $committee->id);
            $committeeMember->delete();
            foreach ($request->member_id as $key => $member_id) {
                $updateData = [
                    'committee_id' => $committee->id,
                    'user_id' => $member_id,
                    'member_type' => $request->member_type[$key]
                ];
                $committee->total_member += 1;
                if ($request->member_type[$key] == 'is_admin') {
                    $committee->total_admin += 1;
                }
                $committee->save();
                CommitteeMember::create($updateData);
            }
            return true;
        } catch (\Exception $exception) {
            throw  $exception;
        }

    }
}
