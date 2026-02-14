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
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_order_id')->constrained('master_orders');
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('property_id')->constrained('properties');
            $table->foreignId('tenant_id')->constrained('users');
            $table->integer('builder_id')->nullable();
            $table->integer('landlord_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->double('amount')->nullable();
            $table->string('note')->nullable();
            $table->string('payment_details')->nullable();
            $table->foreignId('attachment_id')->constrained('images');
            $table->foreignId('created_by')->constrained('users');
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
        Schema::dropIfExists('order_payments');
    }
};
