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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('image_id')->nullable()->constrained('images')->onDelete('cascade');
            $table->string('title',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->longText('content')->nullable();
            $table->integer('serial')->default(0)->nullable();
            $table->integer('parent_id')->nullable();
            $table->boolean('show_menu')->default(false)->nullable();
            $table->boolean('show_testimonial')->default(false)->nullable();
            $table->boolean('show_leadership')->default(false)->nullable();
            $table->tinyInteger('status')->default(App\Enums\Status::ACTIVE);
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
        Schema::dropIfExists('pages');
    }
};
