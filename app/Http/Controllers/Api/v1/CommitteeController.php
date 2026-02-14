<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Committee\CommitteeStoreRequest;
use App\Http\Requests\Committee\CommitteeUpdateRequest;
use App\Http\Resources\Api\v1\CommitteeListResource;
use App\Http\Resources\Api\v1\CommitteeShowResource;
use App\Http\Resources\Api\v1\TenantListResource;
use App\Interfaces\CommitteeInterface;
use App\Models\Committee;
use App\Models\Property\Property;
use App\Models\User;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{

    use ApiReturnFormatTrait;

    protected $committeeRepository;

    public function __construct(CommitteeInterface $committee)
    {
        $this->committeeRepository = $committee;
    }

    public function index()
    {
        try {
            $committees = $this->committeeRepository->getAll();
            $responseData = new CommitteeListResource($committees);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function create()
    {
        try {
            $data['users'] = User::select('id', 'name')->get();
            $taken_properties = Committee::select('id', 'property_id')->get();
            $data['properties'] = Property::select('id', 'name')
                ->whereNotIn('id', $taken_properties->pluck('property_id'))
                ->get();

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

    public function store(CommitteeStoreRequest $request)
    {
        try {
            $result = $this->committeeRepository->store($request);
            return $this->successResponse('success', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function show($id)
    {
        try {
            $committee = $this->committeeRepository->show($id);
            $responseData = new CommitteeShowResource($committee->load('members'));
            return $this->successResponse('Committee Show', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $result = $this->committeeRepository->update($request, $id);
            return $this->successResponse('updated', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $result = $this->committeeRepository->destroy($id);
            return $this->successResponse('Committee Deleted', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }
}
