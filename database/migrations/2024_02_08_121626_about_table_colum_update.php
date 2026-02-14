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

        // Check if table exists
        if (Schema::hasTable('abouts')) {

            // Table exists, now check if column exists
            if (!Schema::hasColumn('abouts', 'main_title')) {
                Schema::table('abouts', function (Blueprint $table) {
                    $table->text('main_title')->nullable();
                });
            }

            if (!Schema::hasColumn('abouts', 'hero_desc')) {
                Schema::table('abouts', function (Blueprint $table) {
                    $table->text('hero_desc')->nullable();
                });
            }
        }

        if (Schema::hasTable('pages')) {

            // Table exists, now check if column exists
            if (!Schema::hasColumn('pages', 'parent_id')) {
                Schema::table('pages', function (Blueprint $table) {
                    $table->integer('parent_id')->nullable();
                });
            }

            if (!Schema::hasColumn('pages', 'show_menu')) {
                Schema::table('pages', function (Blueprint $table) {
                    $table->boolean('show_menu')->default(false)->nullable();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
