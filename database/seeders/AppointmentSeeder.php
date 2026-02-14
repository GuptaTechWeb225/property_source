<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $types = ['letting','sales'];
        for($i = 0; $i < 40; $i++){
            Appointment::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => rand(1000000, 99999999),
                'property_address' => $faker->address,
                'property_type' => ($i%2 == 0) ? $types[0] : $types[1],
                'message' => $faker->text(20),
                'date' => Carbon::now()->addDay($i),
                'time' => '10:00 AM'
            ]);
        }
    }
}
