<?php

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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('property_id')->constrained('properties');
            $table->foreignId('advertisement_id')->constrained('advertisements');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->tinyInteger('is_buy')->nullable()->default(false);
            $table->decimal('price');
            $table->decimal('discount_amount')->nullable()->default(0);
            $table->decimal('total_amount')->nullable()->default(0);
            $table->enum('payment_status',['paid','unpaid','partial'])->default('unpaid');
            $table->enum('status',['pending', 'approved', 'cancelled', 'rejected', 'completed'])->default('pending');
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
        Schema::dropIfExists('order_details');
    }
};
