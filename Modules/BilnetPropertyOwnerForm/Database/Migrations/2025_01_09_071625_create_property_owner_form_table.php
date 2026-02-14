<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyOwnerFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_owner_form', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_owner_id')->constrained('temp_property_owner')->onDelete('cascade');
            $table->string('key');
            $table->text('value')->nullable();
            $table->integer('slide_no');
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
        Schema::dropIfExists('property_owner_form');
    }
}
