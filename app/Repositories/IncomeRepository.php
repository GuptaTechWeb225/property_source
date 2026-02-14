<?php

namespace App\Repositories;

use App\Interfaces\IncomeInterface;
use App\Models\Account;
use App\Models\Income;
use App\Models\Property\Transaction;
use App\Services\TransactionService;
use App\Traits\CommonHelperTrait;
use App\Utils\Utils;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class IncomeRepository.
 */
class IncomeRepository implements IncomeInterface
{
    use CommonHelperTrait;

    protected $model;
    protected $transaction;

    public function __construct(Income $income, TransactionService $transactionService)
    {
        $this->model = $income;
        $this->transaction = $transactionService;
    }

    public function index($paginate = 10)
    {
        $this->model->latest('id')->paginate($paginate);
    }

    public function getPaginateData($request)
    {
        return $this->model->latest('id')->paginate($request->input('paginate', 10));
    }

    public function all()
    {
        return $this->model->all();
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();

            $income = new $this->model;
            $income->account_id = $request->input('account_id');
            $income->category_id = $request->input('category_id');
            $income->amount = $request->input('amount');
            $income->date = $request->input('date');
            $income->reference = $request->input('reference');
            $income->attachment_id = $this->UploadImageCreate($request->attachment, 'backend/uploads/income');
            $income->description = $request->input('description');
            $income->created_by = auth()->id();
            $income->save();

            $this->transaction->storeTransaction(
                $income->account_id,
                $income,
                'credit',
                $income->reference,
                'Cash Payment',
                null,
                $income->amount,
                $income->attachment_id
            );
            Utils::accountbalanceAdjustment($income->account_id);
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
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
            $income = $this->model->find($id);
            $income->account_id = $request->input('account_id');
            $income->category_id = $request->input('category_id');
            $income->amount = $request->input('amount');
            $income->date = $request->input('date');
            $income->reference = $request->input('reference');
            $income->attachment_id = $this->UploadImageUpdate($request->attachment, 'backend/uploads/income', $income->attachment_id);
            $income->description = $request->input('description');
            $income->created_by = auth()->id();
            $income->save();

            $income->transaction()->update([
                'amount' => $income->amount
            ]);
            Utils::accountbalanceAdjustment($income->account_id);
            return true;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function destroy($id)
    {
        try {
            $income = $this->model->find($id);
            if ($income) {
                $income->delete();
                return true;
            }
            return false;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
