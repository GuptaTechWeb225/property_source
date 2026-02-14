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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('main_title')->nullable();
            $table->text('hero_desc')->nullable();
            $table->string('title_one')->nullable();
            $table->string('subtitle_one')->nullable();
            $table->longText('desc_one')->nullable();
            $table->foreignId('image_id_one')->constrained('images')->cascadeOnDelete()->nullable();
            $table->string('title_two')->nullable();
            $table->string('subtitle_two')->nullable();
            $table->longText('desc_two')->nullable();
            $table->foreignId('image_id_two')->constrained('images')->cascadeOnDelete()->nullable();
            $table->string('title_three')->nullable();
            $table->string('subtitle_three')->nullable();
            $table->longText('desc_three')->nullable();
            $table->foreignId('image_id_three')->constrained('images')->cascadeOnDelete()->nullable();
            $table->string('title_four')->nullable();
            $table->string('subtitle_four')->nullable();
            $table->longText('desc_four')->nullable();
            $table->foreignId('image_id_four')->constrained('images')->cascadeOnDelete()->nullable();
            $table->string('title_five')->nullable();
            $table->string('subtitle_five')->nullable();
            $table->longText('desc_five')->nullable();
            $table->longText('download_app_link')->nullable();
            $table->foreignId('image_id_five')->constrained('images')->cascadeOnDelete()->nullable();
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
        Schema::dropIfExists('abouts');
    }
};
