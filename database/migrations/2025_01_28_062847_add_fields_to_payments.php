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
        Schema::table('payments', function (Blueprint $table) {
            $table->string('refund_id')->nullable();
            $table->json('payment_details')->nullable();
            $table->string('currency', 3)->default('USD');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('transaction_id');
            $table->dropColumn('refund_id');
            $table->dropColumn('status');
            $table->dropColumn('payment_details');
            $table->dropColumn('currency');
        });
    }
};
