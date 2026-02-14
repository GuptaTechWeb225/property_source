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
        Schema::create('category_wise_document_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('label');
            $table->string('placeholder')->nullable();
            $table->string('file_type')->nullable()->default('image');
            $table->integer('category_id')->nullable();
            $table->boolean('is_required')->default(1);
            $table->boolean('active_status')->default(1);
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
        Schema::dropIfExists('category_wise_document_templates');
    }
};
