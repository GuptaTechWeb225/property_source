<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommitteeMember\StoreRequest;
use App\Http\Resources\Api\v1\CommitteeMemberListResource;
use App\Http\Resources\Api\v1\CommitteeShowResource;
use App\Interfaces\CommitteeMemberInterface;
use App\Models\Committee;
use App\Models\User;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Http\Request;

class CommitteeMemberController extends Controller
{

    use ApiReturnFormatTrait;

    protected $committeeMemberRepo;

    public function __construct(CommitteeMemberInterface $committee,)
    {
        $this->committeeMemberRepo = $committee;
    }

    public function index()
    {
        try {
            $committees = $this->committeeMemberRepo->getAll();
            $responseData = new CommitteeMemberListResource($committees);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function create()
    {
        try {
            $data['users'] = User::select('id', 'name')->get();
            $data['committees'] = Committee::select('id','name')->get();

            $data['member_type'] = [
                'is_president' => 'President',
                'is_admin' => 'Admin',
                'is_manager' => 'Manager',
            ];
            return $this->successResponse('success', $data);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->committeeMemberRepo->store($request);
            return $this->successResponse('success', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $result = $this->committeeMemberRepo->update($request, $id);
            return $this->successResponse('updated', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $result = $this->committeeMemberRepo->destroy($id);
            return $this->successResponse('Committee Deleted', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }
}
