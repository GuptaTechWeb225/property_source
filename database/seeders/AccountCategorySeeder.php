<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;
use App\Models\Property\Property;
use Illuminate\Support\Facades\DB;
use App\Models\Property\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('account_categories')->insert([
            [
                'user_id' => 8,
                'name' => 'Bank',
                'type' => 'debit',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'user_id' => 11,
                'name' => 'Bank',
                'type' => 'debit',
                'created_by' => 1,
                'updated_by' => 1,
            ]
        ]);

        // $transactions = Transaction::all();
        // foreach ($transactions  as $transaction) {

        //     $bankAccount = BankAccount::where('user_id', $transaction->tenant->user_id)->first();
        //     if($bankAccount  == null) {
        //        $bank_account_id= DB::table('bank_accounts')->insert([
        //             'user_id' =>$transaction->tenant->user_id,
        //             'name' => 'Bank Account ' . ($transaction->tenant->user_id),
        //             'branch' => 'Branch ' . ($transaction->tenant->user_id),
        //             'account_number' => '1234567890',
        //             'account_name' => 'John Doe',
        //             'route_number' => '012345678',
        //             'branch_address' => '123 Main St, Anytown USA',
        //             'created_at' => now(),
        //             'updated_at' => now()
        //         ]);
        //     }
        //     DB::table('accounts')->insert(
        //         [
        //             'transaction_id' => $transaction->id,
        //             'property_id' => $transaction->property_id,
        //             'property_tenant_id' => $transaction->property_tenant_id,
        //             'rental_id' => $transaction->rental_id,
        //             'bank_account_id' => $transaction->tenant->user_id??$bank_account_id,
        //             'amount' => 1000 + rand()%1000,
        //             'type' => 'rent',
        //             'date' => '2023-02-20',
        //             'note' => 'Monthly rent payment'
        //         ]
        //     );
        // }
    }
}
