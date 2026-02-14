<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\Api\v1\TransactionListResource;
use App\Models\Account;
use App\Models\User;
use App\Models\Image;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Property\Property;
use App\Traits\CommonHelperTrait;
use App\Http\Controllers\Controller;
use App\Models\Property\Transaction;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TransactionAllList;
use App\Http\Resources\TransactionPaginateCollection;

class TransactionController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;


    public function index(Request $request)
    {
        $transactions = Transaction::query()->latest();
        $data['messages'] = _trans('common.Transaction');
        if ($request->get('search')) {
            $properties = Property::where('name', 'like', '%' . $request->search . '%')
                ->where('status', 1)
                ->where('user_id', Auth::user()->id)
                ->pluck('id');
            $transactions = $transactions->whereIn('property_id', $properties);
        }
        $transactions = $transactions = $transactions->paginate(10);
        $data['items'] = new TransactionPaginateCollection($transactions);
        return $this->responseWithSuccess($data['messages'], $data, 200);
    }

    public function list($id)
    {
        $transactions = Transaction::find($id);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'date' => 'required|date',
            'amount' => 'required',
            'property_id' => 'required',
            'attachment_id' => 'required',
            'category_ids' => 'required',
            'values' => 'required',
            'tenant_id' => 'required',
            'payment_method' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->responseWithError($validator->errors(), 422);
        }

        try {

            if ($request->property_id) {
                $property = Property::find($request->property_id);
                $tenant = $property->tenants()->where('status', 1)->first();
                $rental = $property->rentals()->where('status', 1)->first();
                $user = $property->user()->where('status', 1)->first();

                $transaction = new Transaction();
                $transaction->type = $request->type;
                $transaction->date = $request->date;
                $transaction->amount = 0;
                $transaction->property_id = $request->property_id;
                $transaction->property_tenant_id = $tenant->id;
                $transaction->rental_id = $rental->id;


                if ($request->attachment_id) {

                    $transaction->attachment_id = $this->UploadImageCreate($request->attachment_id, 'public/uploads/property' . $property->id . '/transactions');
                }
                $transaction->created_by = Auth::user()->id;
                $transaction->updated_by = Auth::user()->id;
                $transaction->save();
                $data['messages'] = _trans('common.Transaction created successfully');
                // $items = json_decode($request->category_ids);
                // $values = json_decode($request->values);

                $items = explode(',', $request->category_ids);
                $values = explode(',', $request->values);

                if ($request->type == "income") {
                    foreach ($items as $key => $item) {
                        $new = new Income();
                        $new->category_id = $item;
                        $new->amount = $values[$key];
                        $new->date = $request->date;

                        $new->property_id = $request->property_id;
                        $new->property_tenant_id = $tenant->id;
                        $new->transaction_id = $transaction->id;
                        $new->user_id = $user->id;
                        $new->save();
                    }
                    $transaction->amount = Income::where('transaction_id', $transaction->id)->sum('amount');
                    $transaction->save();
                }
                if ($request->type == "expense") {
                    foreach ($items as $key => $item) {
                        $new = new Expense();
                        $new->category_id = $item;
                        $new->amount = $values[$key];
                        $new->date = $request->date;

                        $new->property_id = $request->property_id;
                        $new->property_tenant_id = $tenant->id;
                        $new->transaction_id = $transaction->id;
                        $new->user_id = $user->id;
                        $new->save();
                    }
                    $transaction->amount = Expense::where('transaction_id', $transaction->id)->sum('amount');
                    $transaction->save();
                }
            }

            return $this->responseWithSuccess($data['messages'], $data, 200);
        } catch (\Throwable $th) {
           throw $th;
        }
    }

    public function create()
    {

        $data['messages'] = _trans('common.Transaction Create');
        $income = Category::where('type', 'income')->get();
        $expense = Category::where('type', 'expense')->get();
        $property = Property::with('tenants')->where('status', 1)->where('user_id', Auth::user()->id)->get();
        $tenants = User::where('status', 1)->where('role_id', 5)->get();

        // payment_method list for dropdown
        $data['payment_method'] = [
            [
                'name' => _trans('common.Cash')
            ],
            [
                'name' => _trans('common.Bank Transfer')
            ]
        ];

        $data['tenants'] = $tenants->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name
            ];
        });

        $data['tenants'] = $tenants->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name
            ];
        });

        $data['properties'] = $property->map(function ($item) {

            return [
                'id' => $item->id,
                'name' => $item->name,
                'tenant' => @$item->tenants->first()->user->name
            ];
        });

        $data['categories'] = [
            'income' => $income->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title
                ];
            }),
            'expense' => $expense->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title
                ];
            })
        ];
        return $this->responseWithSuccess($data['messages'], $data, 200);
    }

    public function details($id)
    {
        $transaction = Transaction::where('property_id', $id)->first();
        $data['messages'] = "Transaction details";
        return [
            'lists' => [
                'id' => @$transaction->id,
                'property' => @$transaction->property->name,
                // date format will be 20 Jan, 2023
                'app_date' => @$transaction->date ? date('d M, Y', strtotime(@$transaction->date)) : null,
                'attachment' => \apiAssetPath(@$transaction->attachment),
                'tenant' => [
                    'id' => @$transaction->tenant->id,
                    'name' => @$transaction->tenant->user->name,
                    'email' => @$transaction->tenant->user->email,
                    'phone' => @$transaction->tenant->user->phone,
                ],
                'rental_agreement' => [
                    'id' => @$transaction->rental->id,
                    'amount' => @$transaction->rental->rent_amount,
                    'start_date' => @$transaction->rental->move_in,
                    'end_date' => @$transaction->rental->move_out,
                    'note' => @$transaction->rental->note,
                ],
                'amount' => @$transaction->amount,
                'type' => @$transaction->type,
                'date' => @$transaction->date,
                'note' => @$transaction->note,

                'payment_details' => [
                    'payment_method' => @$transaction->payment_method,
                    'cheque_number' => @$transaction->cheque_number,
                    'bank_name' => @$transaction->bank_name,
                    'bank_branch' => @$transaction->bank_branch,
                    'bank_account_number' => @$transaction->bank_account_number,
                    'bank_account_name' => @$transaction->bank_account_name,

                    'online_payment_method' => @$transaction->online_payment_method,
                    'online_payment_transaction_id' => @$transaction->online_payment_transaction_id,
                    'online_payment_transaction_status' => @$transaction->online_payment_transaction_status,
                    'payment_status' => @$transaction->payment_status,
                ],
                'invoice' => [
                    'invoice_number' => @$transaction->invoice_number,
                    'invoice_date' => @$transaction->invoice_date,
                    'app_invoice_date' => @$transaction->invoice_date ? date('d M, Y', strtotime(@$transaction->invoice_date)) : null,
                ]
            ]


        ];
        return $this->responseWithSuccess($data['messages'], $data, 200);
    }

    public function landlordTransactionHistory(Request $request)
    {
        try {
            $user = Auth::user();
            $account = Account::where('user_id', $user->id)->pluck('id');
            $transactions = Transaction::query()
                ->select('id', 'account_id', 'date', 'type', 'reference_no', 'payment_method', 'amount')
                ->whereIn('account_id', $account)
                ->latest()
                ->paginate();
            $data = new TransactionListResource($transactions);
            return $this->responseWithSuccess('Landlord Transaction History', $data, 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage());
        }
    }


}
