<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionPaginateCollection extends ResourceCollection
{
    public function toArray($request)
    {
/*


   $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();
            $table->foreignId('property_tenant_id')->constrained('property_tenants')->cascadeOnDelete();
            $table->foreignId('rental_id')->constrained('rentals')->cascadeOnDelete();

            $table->double('amount')->nullable();
            $table->enum('type', ['rent', 'deposit', 'other'])->default('rent');
            $table->date('date')->nullable();
            $table->longText('note')->nullable();
            $table->tinyInteger('status')->default(App\Enums\Status::ACTIVE);



            $table->enum('payment_method', ['cash', 'cheque', 'bank_transfer','online' ,'other'])->default('cash');
            $table->string('cheque_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_name')->nullable();


            // online payment
            $table->string('online_payment_method')->nullable();
            $table->string('online_payment_transaction_id')->nullable();
            $table->string('online_payment_transaction_status')->nullable();

*/
        $current_page = $this->currentPage();
        $total_pages = $this->lastPage();
        $base_url = \request()->url();

        return [

            'list' => $this->collection->map(function ($data) {
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
            }),
            'links' => [
                "first" =>  $base_url . "?page=1",
                "last" =>   $base_url . "?page=" . $total_pages,
                "prev" =>   $current_page > 1 ? $base_url . "?page=" . ($current_page - 1) : null,
                "next" =>   $current_page < $total_pages ? $base_url . "?page=" . ($current_page + 1) : null,
            ],
            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage(),
            ],
        ];
    }
}
