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
        Schema::create('property_tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties');
            $table->foreignId('user_id')->constrained('users'); // this is for the tenant
            $table->string('tenant_name')->nullable();
            $table->string('landlord_name')->nullable();

            $table->unsignedBigInteger('landowner_id')->nullable(); // property owner id
            $table->unsignedBigInteger('rental_id')->nullable();

            $table->unsignedBigInteger('emergency_contact_id')->nullable(); // relation with emergency_contacts table
            $table->unsignedBigInteger('document_id')->nullable(); // relation with documents table
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('default_image')->nullable();

            $table->tinyInteger('status')->default(App\Enums\Status::ACTIVE);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('property_tenants');
    }
};
