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
        if (Schema::hasTable('abouts')) {

            // Table exists, now check if column exists
            if (!Schema::hasColumn('property_documents', 'status')) {
                Schema::table('property_documents', function (Blueprint $table) {
                    $table->tinyInteger('status')->default(0)->comment('0=pending , 1=Approved, 2=Rejected');;
                });
            }

            if (!Schema::hasColumn('property_documents', 'note')) {
                Schema::table('property_documents', function (Blueprint $table) {
                    $table->string('note')->nullable();
                });
            }


            if (!Schema::hasColumn('property_documents', 'template_id')) {
                Schema::table('property_documents', function (Blueprint $table) {
                    $table->integer('template_id')->nullable();
                });
            }

            if (!Schema::hasColumn('property_documents', 'value')) {
                Schema::table('value', function (Blueprint $table) {
                    $table->text('value')->nullable();
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
