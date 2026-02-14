<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Property\Transaction;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Property\PropertyTenant;
use App\Http\Resources\TenantListPaginateResource;
use App\Http\Resources\TransactionPaginateCollection;

class CashManagementController extends Controller
{
    use ApiReturnFormatTrait;
    public function list()
    {
        $user = Auth::user();
        $expense = Expense::where('id', $user->id)->sum('amount');
        $income = Income::where('id', $user->id)->sum('amount');
        $data['messages'] = "Cash Management";



        $data['expense'] = $expense;
        $data['income'] = $income;
        $data['balance'] = $income - $expense;
        $transactions = Transaction::paginate(10);
        $data['items'] = new TransactionPaginateCollection($transactions);
        return $this->responseWithSuccess($data['messages'], $data, 200);

    }
}
