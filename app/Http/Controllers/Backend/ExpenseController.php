<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\ExpenseInterface;
use App\Models\Account;
use App\Models\AccountCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    protected $expense;
    public function __construct(ExpenseInterface $expense)
    {
        $this->expense =  $expense;
    }

    public function index(Request $request)
    {
        $data['title'] = _trans('landlord.Expense');
        $data['expense'] = $this->expense->getPaginateData($request);
        return view('backend.expense.index')->with($data);
    }


    public function create()
    {
        $data['title'] = _trans('common.Expense Add');
        $data['accounts'] = Account::with('user')->select('id','name','user_id')->get();
        $data['categories'] = AccountCategory::where('status', 'active')
            ->where('type','debit')
            ->select('id','name','type')
            ->get();
        return view('backend.expense.create')->with($data);
    }


    public function store(Request $request)
    {
        try {
            $this->expense->store($request);
            return redirect()->route('expense.index')->with('success', _trans('alert.expense_added_successfully'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


    public function show($id)
    {
        $data['title'] = _trans('landlord.Expense Edit');
        $data['invoice'] = $this->expense->show($id);
        return view('backend.expense.invoice')->with($data);
    }


    public function edit($id)
    {
        $data['title'] = _trans('landlord.Expense Edit');
        $data['accounts'] = Account::with('user')->select('id','name','user_id')->get();
        $data['categories'] = AccountCategory::where('status', 'active')
            ->where('type','debit')
            ->select('id','name','type')
            ->get();
        $data['expense'] = $this->expense->show($id);
        return view('backend.expense.edit')->with($data);
    }


    public function update(Request $request, $id)
    {
        try {
            $this->expense->update($request,$id);
            return redirect()->route('expense.index')->with('success', _trans('alert.expense_update_successfully'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


    public function destroy($id)
    {
        if ($this->expense->destroy($id)) :
            $success[0] = "Deleted Successfully";
            $success[1] = "Success";
            $success[2] = "Deleted";
        else :
            $success[0] = "Something went wrong, please try again.";
            $success[1] = 'error';
            $success[2] = "oops";
        endif;
        return response()->json($success);
    }
}
