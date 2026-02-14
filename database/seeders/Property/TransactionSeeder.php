<?php

namespace Database\Seeders\Property;

use App\Models\User;
use App\Enums\Status;
use App\Models\Image;
use App\Models\Order;
use App\Models\Rental;
use App\Models\Account;
use App\Services\PropertyStatusService;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\BillingAddress;
use App\Models\AccountCategory;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use App\Models\Property\Property;
use App\Models\Property\Transaction;
use App\Models\Property\PropertyTenant;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


        $cats = ['Savings', 'Current'];
        foreach ($cats as $key => $cat) {
            AccountCategory::create([
                'user_id' => 1,
                'name' => $cat,
                'type' => $cat,
                'created_by' => 1,
                'updated_by' => 1
            ]);
        }


        $tenants = PropertyTenant::take(40)->get();
        foreach ($tenants as $key => $tenant) {
            Account::create([
                'user_id' => $tenant->user_id,
                'account_category_id' => ($key % 2 == 0) ? 1 : 2,
                'name' => $faker->company,
                'account_no' => rand(1000000000, 9999999999),
                'balance' => 10000 + ($key * 10),
                'is_default' => 1,
                'created_by' => $tenant->user_id,
                'updated_by' => $tenant->user_id
            ]);


            BillingAddress::create([
                'user_id' => $tenant->user_id,
                'name' => $faker->name,
                'address' => $faker->address,
                'phone' => rand(1000000000, 9999999999),
                'email' => $faker->email
            ]);

            $order = Order::create([
                'invoice_no' => rand(10000, 99999),
                'tenant_id' => $tenant->user_id,
                'billing_address_id' => rand(1, 60),
                'date' => Carbon::now(),
                'subtotal' => ($key + 1) * 1000,
                'grand_total' => ($key + 1) * 1000,
                'paid_amount' => ($key + 1) * 1000 - (500 * $key),
                'due_amount' => ((500 * $key) / 2),
                'discount_amount' => ((500 * $key) / 2),
                'created_by' => $tenant->user_id,
                'updated_by' => $tenant->user_id
            ]);

            $orderDetails = OrderDetail::create([
                'order_id' => $key + 1,
                'property_id' => $tenant->property_id,
                'advertisement_id' => $key + 1,
                'is_buy' => ($key % 2 == 0) ? 1 : 0,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(180),
                'price' => ($key + 1) * 1000,
                'total_amount' => ($key + 1) * 1000,
                'payment_status' => 'paid',
                'status' => 'approved',
            ]);

            $propertyStatusService = new PropertyStatusService();

            $propertyStatusService->updatePropertyStatus($orderDetails->property_id, $orderDetails, 'occupied', true, $order->tenant_id);


            Transaction::create([
                'account_id' => $key + 1,
                'date' => Carbon::now(),
                'sourcable_type' => $key + 1,
                'sourcable_id' => Carbon::now(),
                'type' => Carbon::now()->addDays(180),
                'payment_method' => 'Bank',
                'trx_no' => rand(10000, 99999),
                'amount' => ($key + 1) * 1000,
                'bank_info' => 'approved',
                'created_by' => 'approved'
            ]);
        }


        $order_details = OrderDetail::all();
        foreach ($order_details as $key => $order_detail) {
            $order_detail->payments()->create([
                'invoice_no' => uniqid(),
                'date' => Carbon::today(),
                'amount' => $order_detail->price,
                'payment_method' => 'Bank Payment',
            ]);
        }


        $payments = Payment::all();

        foreach ($payments as $key => $payment) {
            $payment->transactions()->create([
                'account_id' => $key + 1,
                'date' => Carbon::now()->startOfYear()->addMonths(rand(0, 12)),
                'type' => ($key % 2 == 0) ? 'credit' : 'debit',
                'reference_no' => $payment->invoice_no,
                'payment_method' => "Bank",
                'trx_no' => $payment->invoice_no,
                'amount' => $payment->amount,
                'bank_info' => 'Bank Payment',
                'created_by' => @$payment->orderDetail->order->tenant_id ?? $key + 1,
            ]);
        }
    }
}
