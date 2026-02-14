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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->date('date_of_birth')->nullable();
            $table->date('join_date')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->timestamp('email_verified_at')->nullable()->comment('if null then verifield, not null then not verified');
            $table->string('token')->nullable()->comment('Token for email/phone verification, if null then verifield, not null then not verified');
            $table->string('phone')->nullable()->unique();
            $table->string('alt_phone')->nullable();
            $table->string('password');
            $table->string('new_password')->nullable();
            $table->string('confirm_password')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('present_address')->nullable();
            $table->string('institution')->nullable();

            $table->string('country_id')->nullable()->comment('present_country');
            $table->string('city_id')->nullable()->comment('present_city');
            $table->string('state_id')->nullable()->comment('present_state');
            $table->string('zip_code')->nullable()->comment('present_zip_code');
            $table->string('address')->nullable()->comment('present_address');

            $table->string('per_country_id')->nullable()->comment('permanent_country');
            $table->string('per_city_id')->nullable()->comment('permanent_city');
            $table->string('per_state_id')->nullable()->comment('permanent_state');
            $table->string('per_zip_code')->nullable()->comment('permanent_zip_code');
            $table->string('per_address')->nullable()->comment('permanent_address');

            $table->string('occupation')->nullable();
            $table->string('nid')->nullable();
            $table->string('social_security_number')->nullable();
            $table->string('passport')->nullable();
            $table->string('nationality')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('tax_certificate')->nullable();
            $table->string('lang')->nullable();

            $table->integer('property_count')->nullable();

            $table->integer('otp')->nullable();
            $table->text('permissions')->nullable();
            $table->tinyInteger('status')->default(App\Enums\Status::ACTIVE);

            $table->unsignedBigInteger('image_id')->nullable();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('set null');

            $table->unsignedBigInteger('document_id')->nullable();
            $table->foreign('document_id')->references('id')->on('images')->onDelete('set null');

            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');

            $table->unsignedBigInteger('designation_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('set null');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');

            $table->tinyInteger('address_verify')->default(0);
            $table->tinyInteger('req_address_verify')->default(0);
            $table->text('address_details')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
