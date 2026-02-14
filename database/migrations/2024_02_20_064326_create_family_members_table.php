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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties');
            $table->foreignId('tenant_id')->constrained('users');
            $table->foreignId('order_details_id')->constrained('order_details');
            $table->string('name');
            $table->string('relation')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('photo_id')->nullable()->constrained('images')->cascadeOnDelete();
            $table->foreignId('document_id')->nullable()->constrained('images')->cascadeOnDelete();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('family_members');
    }
};
