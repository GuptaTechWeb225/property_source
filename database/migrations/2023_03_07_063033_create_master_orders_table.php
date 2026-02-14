<?php

use App\Enums\OrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_orders', function (Blueprint $table) {
            $table->id();
            $table->date('order_date');
            $table->string('order_number');

            // about  orders
            $table->string('order_status')->default(OrderStatus::PENDING);
            $table->string('payment_status')->default('pending');
            $table->string('payment_method')->default('cash');

            $table->double('total_amount', 16, 2)->default(0);
            $table->double('discount_amount')->default(0);
            $table->double('paid_amount')->default(0);
            $table->double('due_amount')->default(0);


            // billing address
            $table->unsignedBigInteger('billing_address_id')->nullable();
            $table->unsignedBigInteger('rental_id')->nullable(); // for rental


            $table->unsignedBigInteger('tenant_id')->nullable(); // for rental


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_orders');
    }
};
