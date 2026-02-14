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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('property_address')->nullable();
            $table->enum('property_type', ['letting','sales'])->nullable();
            $table->integer('property_id')->nullable();
            $table->integer('time_slot_id')->nullable();
            $table->text('message')->nullable();
            $table->date('date');
            $table->string('time')->nullable();
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
        Schema::dropIfExists('appointments');
    }
};
