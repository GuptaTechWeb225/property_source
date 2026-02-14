<?php

namespace App\Repositories;

use App\Interfaces\ExpenseInterface;
use App\Models\Expense;
use App\Services\TransactionService;
use App\Traits\CommonHelperTrait;
use App\Utils\Utils;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ExpenseRepository.
 */
class ExpenseRepository implements ExpenseInterface
{
    use CommonHelperTrait;

    protected $model;
    protected $transaction;
    public function __construct(Expense $expense, TransactionService $transactionService)
    {
        $this->model = $expense;
        $this->transaction = $transactionService;
    }

    public function index($paginate = 10)
    {
        $this->model->latest('id')->paginate($paginate);
    }

    public function getPaginateData($request)
    {
        return $this->model->latest('id')->paginate($request->input('paginate',10));
    }

    public function all()
    {
        return $this->model->all();
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();

            $expense                 = new $this->model;
            $expense->account_id     = $request->input('account_id');
            $expense->category_id    = $request->input('category_id');
            $expense->amount         = $request->input('amount');
            $expense->date           = $request->input('date');
            $expense->reference      = $request->input('reference');
            $expense->attachment_id  = $this->UploadImageCreate($request->attachment,'backend/uploads/income');
            $expense->description    = $request->input('description');
            $expense->created_by     = auth()->id();
            $expense->save();

            $this->transaction->storeTransaction(
                $expense->account_id,
                $expense,
                'debit',
                $expense->reference,
                'Cash Payment',
                null,
                $expense->amount,
                $expense->attachment_id
            );
            Utils::accountbalanceAdjustment($expense->account_id);
            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($request,$id)
    {
        try {
            DB::beginTransaction();

            $expense                 = $this->model->find($id);
            $expense->account_id     = $request->input('account_id');
            $expense->category_id    = $request->input('category_id');
            $expense->amount         = $request->input('amount');
            $expense->date           = $request->input('date');
            $expense->reference      = $request->input('reference');
            $expense->attachment_id  = $this->UploadImageUpdate($request->attachment,'backend/uploads/income', $expense->id);
            $expense->description    = $request->input('description');
            $expense->created_by     = auth()->id();
            $expense->save();

            $expense->transaction()->update([
                'amount' => $expense->amount
            ]);

            Utils::accountbalanceAdjustment($expense->account_id);
            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
    }

    public function destroy($id)
    {
        try {
            $expense = $this->model->find($id);
            if ($expense) {
                $expense->delete();
                return true;
            }
            return false;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
