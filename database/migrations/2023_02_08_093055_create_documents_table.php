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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('filename')->nullable();
            $table->decimal('size', 8, 2)->default('0')->nullable();
            $table->enum('attachment_table', ['property', 'tenant', 'landlord', 'user'])->nullable()->default('property');
            $table->unsignedBigInteger('attachment_table_id')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('attachment_id')->constrained('images')->cascadeOnDelete();
            $table->enum('attachment_type', ['normal', 'agreement', 'contract', 'invoice', 'receipt', 'complain'])->nullable()->default('normal');
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
        Schema::dropIfExists('documents');
    }
};
