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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties');
            $table->foreignId('tenant_id')->constrained('users');
            $table->date('due_date');
            $table->string('month');
            $table->decimal('amount');
            $table->enum('payment_status',['pending','paid','unpaid'])->default('pending');
            $table->tinyInteger('status')->default(1);
            $table->decimal('fine_amount')->nullable()->default(0);
            $table->decimal('total_amount')->default(0);
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
        Schema::dropIfExists('bills');
    }
};
