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
        Schema::table('properties', function (Blueprint $table) {
            $table->tinyInteger('is_trending')->default(0);
            $table->tinyInteger('is_populer')->default(0);
            $table->tinyInteger('is_recommended')->default(0);
            $table->tinyInteger('is_most_populer')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['is_trending','is_populer','is_recommended','is_most_populer']);
        });
    }
};
