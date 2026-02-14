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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('size')->nullable()->comment('Always in Square Feet');
            $table->string('dining_combined')->nullable();

            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('rent_amount')->nullable();
            $table->string('price_range')->nullable();
            $table->string('flat_no')->nullable();
            $table->longText('description')->nullable();
            $table->enum('vacant',[1,0])->nullable()->comment('1 for vacant, 0 for not vacant');
            $table->tinyInteger('completion')->default(App\Enums\Completion::COMPLETED);
            $table->tinyInteger('deal_type')->default(App\Enums\DealType::RENT);
            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            $table->tinyInteger('type')->default(App\Enums\PropertyType::RESIDENTIAL);

            $table->bigInteger('total_unit')->nullable();
            $table->bigInteger('total_occupied')->nullable();
            $table->bigInteger('total_rent')->nullable();
            $table->bigInteger('total_sell')->nullable();

            $table->enum('discount_type', ['fixed', 'percentage'])->nullable()->default('fixed')->comment('fixed or percentage');
            $table->double('discount_amount')->nullable()->default(0);

            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('default_image')->nullable()->constrained('images')->cascadeOnDelete();
            $table->foreignId('property_category_id')->nullable()->constrained('property_categories');

            // $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            // $table->foreignId('default_image')->nullable()->constrained('images')->cascadeOnDelete();
            // $table->foreignId('property_category_id')->nullable()->constrained('property_categories')->cascadeOnDelete();
            $table->string('video_verification')->nullable();
            $table->tinyInteger('video_verification_status')->default(0);
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
        Schema::dropIfExists('properties');
    }
};
