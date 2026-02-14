<?php

namespace Modules\Marsland\Http\Controllers;

use App\Http\Requests\Account\AccountStoreRequest;
use App\Interfaces\AccountCategoryInterface;
use App\Interfaces\AccountInterface;
use App\Models\AccountCategory;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    protected $account;
    protected $categoryRepo;
    public function __construct(AccountInterface $account, AccountCategoryInterface $accountCategoryInterface)
    {
        $this->account = $account;
        $this->categoryRepo = $accountCategoryInterface;
    }

    public function index()
    {
        $data['title']      = _trans('common.Accounts');
        $data['accounts']       = $this->account->getAll();
        return view('marsland::customer.account.index')->with($data);
    }


    public function create()
    {
        $data['title']      = _trans('common.Account Create');
        $data['categories'] = $this->categoryRepo->roleBaseList();
        return view('marsland::customer.account.create')->with($data);
    }

    public function store(AccountStoreRequest $request)
    {
        try {
            $this->account->store($request);
            return redirect()->route('customer.account.index')->with('success', _trans('alert.account_created_successfully'));
        }catch (\Exception $exception){
            return redirect()->route('customer.account.index')->with('danger', _trans('alert.'.$exception->getMessage()));
        }
    }

    public function edit($id)
    {
        $data['title']      = _trans('common.Account Edit');
        $data['account'] = $this->account->show($id);
        return view('backend.account.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->account->update($request, $id);
            return redirect()->route('account.index')->with('success', _trans('alert.account_update_successfully'));
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }


    public function destroy($id)
    {
        if ($this->account->destroy($id)) :
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
