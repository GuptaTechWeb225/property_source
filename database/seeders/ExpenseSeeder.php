<?php

namespace Database\Seeders;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Property\Transaction;
use App\Models\Property\PropertyTenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::where('type', 'expense')->get();
        $transactions = Transaction::all();
        foreach ($transactions as $transaction){
            foreach ( $categories as  $category){
                Expense::create(
                    [
                        'title' => $category->title,
                        'amount' => 1000 + rand() % 125120,
                        'date' => '2021-08-03',
                        'category_id' => $category->id,
                        'transaction_id' => $transaction->id,
                        'property_id' => $transaction->property_id,
                        'property_tenant_id' => $transaction->property_tenant_id,
                        'user_id' => $transaction->property->user_id,
                    ]
                );

            }

        }
    }
}
