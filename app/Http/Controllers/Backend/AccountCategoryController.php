<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountStoreRequest;
use App\Http\Requests\AccountCategory\StoreRequest;
use App\Interfaces\AccountCategoryInterface;
use Illuminate\Http\Request;

class AccountCategoryController extends Controller
{
    protected $accountCategory;
    public function __construct(AccountCategoryInterface $accountCategoryInterface)
    {
        $this->accountCategory = $accountCategoryInterface;
    }

    public function index()
    {
        $data['title'] = _trans('landlord.Account Category');
        $data['categories'] = $this->accountCategory->index();
        return view('backend.account_category.index')->with($data);
    }


    public function create()
    {
        $data['title'] = _trans('landlord.Account Category Add');
        return view('backend.account_category.create')->with($data);
    }


    public function store(StoreRequest $request)
    {
        try {
            $this->accountCategory->store($request);
            return redirect()->route('account_category.index')->with('success', _trans('alert.category_created_successfully'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }

    public function edit($id)
    {
        $data['title'] = _trans('landlord.Account Category Edit');
        $data['category'] = $this->accountCategory->show($id);
        return view('backend.account_category.edit')->with($data);
    }


    public function update(Request $request, $id)
    {
        try {
            $this->accountCategory->update($request, $id);
            return redirect()->route('account_category.index')->with('success', _trans('alert.category_updated_successfully'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


    public function destroy($id)
    {
        if ($this->accountCategory->destroy($id)) :
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
