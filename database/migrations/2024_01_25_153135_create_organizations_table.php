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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('tin_number')->nullable();
            $table->string('type')->nullable();
            $table->text('director_details')->nullable();
            $table->foreignId('incorporation_attachment_id')->nullable()->constrained('images')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('business_attachment_id')->nullable()->constrained('images')->onUpdate('cascade')->onDelete('cascade');
            $table->text('description')->nullable();

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
        Schema::dropIfExists('organizations');
    }
};
