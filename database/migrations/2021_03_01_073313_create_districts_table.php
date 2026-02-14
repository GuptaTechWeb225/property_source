<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('country_id')->default(1)->nullable();

            $table->unsignedBigInteger('division_id')->nullable();

            $table->string('name', 200)->unique();
            $table->string('bn_name', 200);
            $table->string('lon', 200)->nullable();
            $table->string('lat', 200)->nullable();
            $table->string('url', 200)->nullable();
            $table->boolean('status')->default(1);

            $table->timestamps();

            // database table index create
            $table->index(['country_id', 'division_id']);
        });

        $file_path =  database_path('seeders/sql/districts.sql');
        if (File::exists($file_path)){
            try {
                DB::unprepared($file_path);
            }catch (\Exception $e){
                Log::error($e->getMessage());
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
        Schema::dropIfExists('districts');
    }
}
