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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts');
            $table->date('date');
            $table->morphs('sourcable');
            $table->enum('type',['debit','credit']);
            $table->string('reference_no')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('trx_no')->nullable();
            $table->decimal('amount')->nullable();
            $table->unsignedBigInteger('attachment_id')->nullable();
            $table->text('bank_info')->nullable();
            $table->foreignId('created_by');
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
        Schema::dropIfExists('transactions');
    }
};
