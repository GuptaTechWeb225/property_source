<?php

namespace Database\Seeders;

use App\Models\Locations\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $sql = file_get_contents(database_path('sql/cities.sql'));
            DB::unprepared($sql);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}
