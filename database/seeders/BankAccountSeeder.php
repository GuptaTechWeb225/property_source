<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=User::whereIn('role_id', [4,5])->get();

        foreach ($users as $i=>$user) {
                DB::table('bank_accounts')->insert([
                    'user_id' => $user->id,
                    'name' => 'Bank Account ' . ($i+1),
                    'branch' => 'Branch ' . ($i+1),
                    'account_number' => '1234567890',
                    'account_name' => 'John Doe',
                    'route_number' => '012345678',
                    'branch_address' => '123 Main St, Anytown USA',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
        }

    }
}
