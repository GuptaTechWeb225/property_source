<?php

namespace Modules\Marsland\Http\Controllers;

use App\Http\Requests\Account\AccountStoreRequest;
use App\Http\Requests\AccountCategory\StoreRequest;
use App\Interfaces\AccountCategoryInterface;
use App\Interfaces\AccountInterface;
use App\Models\AccountCategory;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AccountCategoryController extends Controller
{
    protected $account;
    protected $categoryRepo;
    public function __construct(AccountInterface $account, AccountCategoryInterface $category)
    {
        $this->account = $account;
        $this->categoryRepo = $category;
    }

    public function index()
    {
        $data['title']      = _trans('common.Accounts');
        $data['categories']       = $this->categoryRepo->roleBaseList();
        return view('marsland::customer.account_category.index')->with($data);
    }


    public function create()
    {
        $data['title']      = _trans('common.Account Category Add');
        $data['categories'] = $this->categoryRepo->roleBaseList();
        return view('marsland::customer.account_category.create')->with($data);
    }

    public function store(StoreRequest $request)
    {
        try {
            $this->categoryRepo->store($request);
            return redirect()->route('customer.account_category.index')->with('success', _trans('alert.Successfully created'));
        }catch (\Exception $exception){
            return redirect()->route('customer.account_category.index')->with('danger', _trans('alert.'.$exception->getMessage()));
        }
    }

    public function edit($id)
    {
        $data['title']      = _trans('common.Account Category Edit');
        $data['category'] = $this->categoryRepo->show($id);
        return view('marsland::customer.account_category.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->categoryRepo->update($request, $id);
            return redirect()->route('customer.account_category.index')->with('success', _trans('alert.Successfully updated'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $this->categoryRepo->destroy($id);
            return redirect()->back()->with('success', _trans('alert.Successfully deleted!'));
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('danger', _trans('alert.Something went wrong!'));
        }
    }


    public function paymentHistory(Request $request)
    {
        $invoice_no = $request->input('invoice_no');
        $date = $request->input('date');
        $data['title'] = _trans('common.Payments');
        $data['payments'] = Payment::select('id','invoice_no','date','amount','payment_method','trx_no','attachment_id')
            ->when($invoice_no, function ($query) use ($invoice_no) {
                $query->where('invoice_no', 'LIKE',"%$invoice_no%");
            })
            ->when($date, function ($query) use ($date) {
                $query->whereDate('date', $date);
            })
            ->latest('id')
            ->get();
        return view('backend.account.payment')->with($data);
    }



    public function paymentDetails($id)
    {
        $data['title'] = _trans('common.Payment Details');
        $data['payment'] = Payment::findOrFail($id);
        return view('backend.account.payment_details')->with($data);
    }
}
