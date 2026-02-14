<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class CreateUnionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('upazilla_id')->nullable();

            $table->string('name', 200);
            $table->string('bn_name', 200);
            $table->string('url', 200)->nullable();
            $table->boolean('status')->default(1);

            $table->timestamps();


            // database table index create
            $table->index(['upazilla_id']);

        });

//        $file_path =  database_path('seeders/sql/unions.sql');
//        Log::info('unions File path'. $file_path);
//        if (File::exists($file_path)){
//            Log::info('unions File Exist'. $file_path);
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
        Schema::dropIfExists('unions');
    }
}
