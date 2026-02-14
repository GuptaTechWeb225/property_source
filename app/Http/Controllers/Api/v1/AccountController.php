<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountStoreRequest;
use App\Http\Requests\Account\AccountUpdateRequest;
use App\Http\Requests\AccountCategory\StoreRequest;
use App\Http\Resources\Api\v1\AccountListResource;
use App\Interfaces\AccountInterface;
use App\Models\AccountCategory;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    use ApiReturnFormatTrait;
    protected $accountRepository;

    public function __construct(AccountInterface $accountInterface)
    {
        $this->accountRepository = $accountInterface;
    }

    public function index(Request $request)
    {
        try {
            $accounts = $this->accountRepository->index();
            $responseData = new AccountListResource($accounts);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function create()
    {
        try {
            $accountCategory = AccountCategory::select('id','name','type')->where('status', 'active')->get();
            return $this->successResponse('Account category', $accountCategory);
        }catch (\Exception $exception){
            return $this->responseWithError($exception->getMessage(), 500);
        }
    }

    public function store(AccountStoreRequest $request)
    {
        try {
            $result = $this->accountRepository->store($request);;
            return $this->successResponse('success', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function update(AccountUpdateRequest $request, $id)
    {
        try {
            $result = $this->accountRepository->update($request, $id);
            return $this->successResponse('updated', $result);
        } catch (\Exception $exception) {
            return $this->responseWithError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $result = $this->accountRepository->destroy($id);
            return $this->responseWithSuccess('deleted', $result);
        } catch (\Exception $exception) {
            return $this->responseWithError($exception->getMessage(), 500);
        }
    }
}
