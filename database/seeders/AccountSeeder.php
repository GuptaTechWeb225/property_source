<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;
use App\Models\Property\Property;
use Illuminate\Support\Facades\DB;
use App\Models\Property\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('accounts')->insert([
            [
                'user_id' => 8,
                'account_category_id' => 1,
                'name' => 'Bank',
                'account_no' => '324d3434123',
                'balance' => 10000,
                'is_default' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'user_id' => 11,
                'account_category_id' => 1,
                'name' => 'Bank',
                'account_no' => '324d3434123',
                'balance' => 10000,
                'is_default' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ]
        ]);


    }
}
