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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            // Business Model
            $table->string('business_model_title')->nullable();
            $table->string('business_model_description')->nullable();
            $table->string('business_model_link')->nullable();
            // Feature
            $table->string('feature_title')->nullable();
            $table->string('feature_description')->nullable();
            // How it works
            $table->string('howitworks_title')->nullable();
            $table->string('howitworks_description')->nullable();
            // Download Our Mobile App
            $table->string('app_store_link')->nullable();
            $table->string('play_store_link')->nullable();
            // Testimonial
            $table->string('testimonial_title')->nullable();
            $table->string('testimonial_description')->nullable();
            // Blogs
            $table->string('blogs_title')->nullable();
            $table->string('blogs_description')->nullable();


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
        Schema::dropIfExists('home_pages');
    }
};
