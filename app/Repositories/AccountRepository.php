<?php

namespace App\Repositories;

use App\Interfaces\AccountInterface;
use App\Models\Account;
use App\Traits\CommonHelperTrait;

/**
 * Class AccountRepository.
 */

class AccountRepository implements AccountInterface
{
    use CommonHelperTrait;

    private Account $model;

    public function __construct(Account $model)
    {
        $this->model = $model;
    }

    public function index($paginate = 10)
    {
        return $this->model->where('user_id', auth()->id())->latest('id')->paginate($paginate);
    }


    public function getAll()
    {
        return $this->model->latest()
            ->when(auth()->user()->role_id != 1, function($query) {
                $query->where('user_id', auth()->id());
            })
            ->paginate(10);
    }

    public function store($request)
    {
        try {
            $account = new $this->model;
            $account->user_id = auth()->id();
            $account->account_category_id = $request->account_category_id;
            $account->name =$request->name;
            $account->account_no =$request->account_no;
            $account->balance =$request->balance;
            $account->is_default =$request->is_default;
            $account->details =$request->details;
            $account->created_by = auth()->id();
            $account->updated_by = auth()->id();
            $account->save();
            return true;
        } catch (\Exception $exception) {
           throw $exception;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($request, $id)
    {
        try {
            $account = $this->model->find($id);
            $account->user_id = auth()->id();
            $account->account_category_id = $request->account_category_id;
            $account->name =$request->name;
            $account->account_no =$request->account_no;
            $account->balance =$request->balance;
            $account->is_default =$request->is_default;
            $account->details =$request->details;
            $account->created_by = auth()->id();
            $account->updated_by = auth()->id();
            $account->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $account = $this->model->findOrFail($id);
            $account->delete();
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
