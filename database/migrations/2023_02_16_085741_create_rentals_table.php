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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->date('move_in');
            $table->date('move_out')->nullable();
            $table->date('reminder_date')->nullable();
            $table->double('advance_amount')->nullable();
            $table->double('rent_amount')->nullable();
            $table->enum('rent_type',['monthly','yearly'])->default('monthly');
            $table->integer('rent_for')->nullable();
            $table->longText('note')->nullable();
            $table->tinyInteger('status')->default(App\Enums\Status::ACTIVE);
            $table->foreignId('property_tenant_id')->constrained('property_tenants')->cascadeOnDelete();
            $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();

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
        Schema::dropIfExists('rentals');
    }
};
