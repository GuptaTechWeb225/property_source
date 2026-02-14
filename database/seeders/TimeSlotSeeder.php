<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TimeSlot::insert([
            [
                'start_time' => '09:00 AM',
                'end_time' => '10:00 AM',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '10:00 AM',
                'end_time' => '11:00 AM',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '11:00 AM',
                'end_time' => '12:00 PM (Noon)',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '12:00 PM (Noon)',
                'end_time' => '1:00 PM',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '1:00 PM',
                'end_time' => '2:00 PM',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '2:00 PM',
                'end_time' => '3:00 PM',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '3:00 PM',
                'end_time' => '4:00 PM',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '4:00 PM',
                'end_time' => '5:00 PM',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '5:00 PM',
                'end_time' => '6:00 PM',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '6:00 PM',
                'end_time' => '7:00 PM',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
