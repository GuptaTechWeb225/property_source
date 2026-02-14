<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class CreateUpazilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upazilas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('country_id')->default(1)->nullable();

            $table->unsignedBigInteger('division_id')->nullable();

            $table->unsignedBigInteger('district_id')->nullable();



            $table->string('name', 200);
            $table->string('bn_name', 200);
            $table->string('url', 200)->nullable();
            $table->boolean('status')->default(1);
            $table->decimal('charge', 16, 2)->default(120.00);
            $table->decimal('per_kg', 16, 2)->default(30.00);
            $table->boolean('is_free_shipping')->default(0);

            $table->timestamps();


            // database table index create
            $table->index(['country_id', 'division_id', 'district_id']);
        });

//        $file_path =  database_path('seeders/sql/upazilas.sql');
//        Log::info('File path'. $file_path);
//        if (File::exists($file_path)){
//            Log::info('File Exist'. $file_path);
//            DB::unprepared($file_path);
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upazilas');
    }
}
