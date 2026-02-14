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
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->decimal('min_price')->default(0);
            $table->decimal('max_price')->default(0);
            $table->tinyInteger('purpose')->nullable()->comment('1:Rent;2:Sell;3:mortgage;4:Lease;5:caretaker;');
            $table->integer('post_code')->nullable();
            $table->float('radius')->nullable()->default(0);
            $table->foreignId('property_category_id')->nullable()->constrained('property_categories');
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
        Schema::dropIfExists('requirements');
    }
};
