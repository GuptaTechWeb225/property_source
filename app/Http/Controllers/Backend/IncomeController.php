<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Income\StoreRequest;
use App\Interfaces\IncomeInterface;
use App\Models\Account;
use App\Models\AccountCategory;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    protected $income;
    public function __construct(IncomeInterface $income)
    {
        $this->income =  $income;
    }

    public function index(Request $request)
    {
        $data['title'] = _trans('landlord.Incomes');
        $data['incomes'] = $this->income->getPaginateData($request);
        return view('backend.income.index')->with($data);
    }


    public function create()
    {
        $data['title'] = _trans('landlord.Income Add');
        $data['accounts'] = Account::with('user')
            ->when(auth()->user()->role_id != 1, function($query) {
                $query->where('user_id', auth()->id());
            })
            ->select('id','name','user_id')
            ->get();
        $data['categories'] = AccountCategory::where('status', 'active')
            ->where('type','credit')
            ->select('id','name','type')
            ->get();
        return view('backend.income.create')->with($data);
    }


    public function store(StoreRequest $request)
    {
        try {
            $this->income->store($request);
            return redirect()->route('income.index')->with('success', _trans('alert.income_added_successfully'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


    public function show($id)
    {
        $data['title'] = _trans('landlord.Income Edit');
        $data['invoice'] = $this->income->show($id);
        return view('backend.income.invoice')->with($data);
    }


    public function edit($id)
    {
        $data['title'] = _trans('landlord.Income Edit');
        $data['accounts'] = Account::with('user')->select('id','name','user_id')->get();
        $data['categories'] = AccountCategory::where('status', 'active')
            ->where('type','credit')
            ->select('id','name','type')
            ->get();
        $data['income'] = $this->income->show($id);
        return view('backend.income.edit')->with($data);
    }


    public function update(Request $request, $id)
    {
        try {
            $this->income->update($request,$id);
            return redirect()->route('income.index')->with('success', _trans('alert.income_update_successfully'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


    public function destroy($id)
    {
        if ($this->income->destroy($id)) :
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
