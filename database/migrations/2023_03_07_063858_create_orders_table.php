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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->unique();
            $table->foreignId('tenant_id')->constrained('users')->onDelete('cascade');
            $table->date('date');
            $table->string('coupon_code')->nullable();
            $table->decimal('subtotal');
            $table->decimal('discount_amount')->nullable()->default(0);
            $table->decimal('coupon_amount')->nullable()->default(0);
            $table->decimal('grand_total');
            $table->decimal('paid_amount')->nullable()->default(0);
            $table->decimal('due_amount')->nullable()->default(0);
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
};
