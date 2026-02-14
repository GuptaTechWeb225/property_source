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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->enum('type',['income', 'expense'])->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('icon_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->tinyInteger('status')->default(App\Enums\Status::ACTIVE);
            $table->timestamps();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('set null');
            $table->foreign('icon_id')->references('id')->on('images')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
