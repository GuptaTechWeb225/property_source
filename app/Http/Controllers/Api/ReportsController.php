<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Property\Property;
use App\Http\Controllers\Controller;
use App\Models\Property\Transaction;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Property\PropertyTenant;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TransactionPaginateCollection;

class ReportsController extends Controller
{
    use ApiReturnFormatTrait;
    //search
    public function search(Request $request)
    {

        $inputs = Validator::make($request->all(), [
            'property_id' => 'required',
            'tenant_id' => 'required',
        ]);

        // if api validation failed
        if ($inputs->fails()) {
            return response()->json([
                'errors' => $data->errors(),
                'messages' => [
                    'property_id' => 'Property Id is required',
                    'tenant_id' => 'Tenant Id is required',
                ],
                'sample' => [
                    "property_id" => "1",
                    "tenant_id" => "1",
                ],
            ], 422);
        }
        try {
            $transactions = Transaction::where('property_id', $request->property_id)->where('property_tenant_id', $request->tenant_id)->get();
            $data['transactions'] = $transactions->map(function ($data) {
                return [
                    'id' => @$data->id,
                    'property' => @$data->property->name,
                    // date format will be 20 Jan, 2023
                    'app_date' => @$data->date ? date('d M, Y', strtotime(@$data->date)) : null,
                    'attachment' => \apiAssetPath(@$data->attachment),
                    'tenant' => [
                            'id' => @$data->tenant->id,
                            'name' => @$data->tenant->user->name,
                            'email' => @$data->tenant->user->email,
                            'phone' => @$data->tenant->user->phone,
                        ],
                    'rental_agreement' => [
                        'id' => @$data->rental->id,
                        'amount' => @$data->rental->rent_amount,
                        'start_date' => @$data->rental->move_in,
                        'end_date' => @$data->rental->move_out,
                        'note' => @$data->rental->note,
                    ],
                    'amount' => @$data->amount,
                    'type' => @$data->type,
                    'date' => @$data->date,
                    'note' => @$data->note,

                    'payment_details' => [
                        'payment_method'=> @$data->payment_method,
                        'cheque_number'=> @$data->cheque_number,
                        'bank_name'=> @$data->bank_name,
                        'bank_branch'=> @$data->bank_branch,
                        'bank_account_number'=> @$data->bank_account_number,
                        'bank_account_name'=> @$data->bank_account_name,

                        'online_payment_method'=> @$data->online_payment_method,
                        'online_payment_transaction_id'=> @$data->online_payment_transaction_id,
                        'online_payment_transaction_status'=> @$data->online_payment_transaction_status,
                        'payment_status'=> @$data->payment_status,
                    ],
                    'invoice'=>[
                        'invoice_number'=> @$data->invoice_number,
                        'invoice_date'=> @$data->invoice_date,
                        'app_invoice_date'=> @$data->invoice_date ? date('d M, Y', strtotime(@$data->invoice_date)) : null,
                    ]


                ];
            });

            $data['messages'] = 'Transactions List';
            return $this->responseWithSuccess($data['messages'], $data, 200);
        } catch (\Throwable $th) {
           throw $th;
        }

    }

    // properties
    public function properties(Request $request)
    {
        $properties = Property::where('status', 1)->where('user_id', Auth::user()->id)->select('id', 'name')->get();
        $data['properties'] = $properties->map(function ($data) {
            return [
                'id' => @$data->id,
                'name' => @$data->name,
            ];
        });
        $data['messages'] = 'Properties List';
        return $this->responseWithSuccess($data['messages'], $data, 200);
    }

    public function propertyWiseTenants(Request $request, $property_id)
    {
        $tenants = PropertyTenant::where('property_id', $property_id)
            ->where('landowner_id', Auth::user()->id)
            ->where('status', 1)->get();
        $data['tenants'] = $tenants->map(function ($data) {
            return [
                'id' => @$data->id,
                'name' => @$data->user->name,
            ];
        });
        $data['messages'] = 'Tenants List';
        return $this->responseWithSuccess($data['messages'], $data, 200);
    }
}
