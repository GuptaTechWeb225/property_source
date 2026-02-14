<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountCategory\StoreRequest;
use App\Http\Resources\Api\v1\AccountCategoryListResource;
use App\Http\Resources\Api\v1\CommitteeListResource;
use App\Interfaces\AccountCategoryInterface;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Http\Request;

class AccountCategoryController extends Controller
{
    use ApiReturnFormatTrait;
    protected $accountRepository;

    public function __construct(AccountCategoryInterface $accountCategory)
    {
        $this->accountRepository = $accountCategory;
    }

    public function index()
    {
        try {
            $accounts = $this->accountRepository->index();
            $responseData = new AccountCategoryListResource($accounts);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            $result = $this->accountRepository->store($request);;
            return $this->successResponse('success', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function update(StoreRequest $request, $id)
    {
        try {
            $result = $this->accountRepository->update($request, $id);
            return $this->successResponse('updated', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $result = $this->accountRepository->destroy($id);
            return $this->successResponse('deleted', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }
}
