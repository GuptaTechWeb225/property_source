<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LandlordInstallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            ini_set('max_execution_time', -1);
            $sql = file_get_contents('frontend/installer/db/landlord.sql');

            DB::unprepared($sql);
        } catch (\Throwable $th) {
            \Log::info($th);
        }
    }
}
