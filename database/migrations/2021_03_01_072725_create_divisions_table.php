<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('country_id')->default(1)->nullable();

            $table->string('name', 200)->unique();
            $table->string('bn_name', 200);
            $table->string('url', 200);
            $table->boolean('status')->default(1);
            $table->timestamps();

            // database table index create
            $table->index(['country_id', 'status']);
        });

        $sql = "INSERT INTO `divisions` (`id`, `country_id`, `name`, `bn_name`, `url`, `status`, `created_at`, `updated_at`) VALUES
        (1, 1, 'Dhaka', '', '', 1, '2021-07-19 07:53:07', '2021-07-19 07:53:07'),
        (2, 1, 'Mymensingh', '', '', 1, '2021-07-19 07:53:10', '2021-07-19 07:53:10'),
        (3, 1, 'Khulna', '', '', 1, '2021-07-19 07:53:10', '2021-07-19 07:53:10'),
        (4, 1, 'Rajshahi', '', '', 1, '2021-07-19 07:53:11', '2021-07-19 07:53:11'),
        (5, 1, 'Sylhet', '', '', 1, '2021-07-19 07:53:12', '2021-07-19 07:53:12'),
        (6, 1, 'Barisal', '', '', 1, '2021-07-19 07:53:12', '2021-07-19 07:53:12'),
        (7, 1, 'Chittagong', '', '', 1, '2021-07-19 07:53:12', '2021-07-19 07:53:12'),
        (8, 1, 'Rangpur', '', '', 1, '2021-07-19 07:53:13', '2021-07-19 07:53:13')";
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
}
