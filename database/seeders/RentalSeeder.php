<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Rental;
use Illuminate\Database\Seeder;
use App\Models\Property\Property;
use Illuminate\Support\Facades\DB;
use App\Models\Property\PropertyTenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = PropertyTenant::all();
        foreach ($tenants as $tenant) {
            $rentals = Property::where('id', $tenant->property_id)->get();

            foreach ($rentals as $rental) {
                $year = rand(2021, 2040);
                $month = rand(1, 12);
                $day = rand(1, 28);

                $date = Carbon::create($year, $month, $day);
                $types = ['monthly', 'yearly'];
                Rental::create([
                    'property_id' => $rental->id,
                    'property_tenant_id' => $tenant->id,
                    'move_in' => $date->format('Y-m-d'),
                    'reminder_date' => $date->addDays(rand(1, 10))->format('Y-m-d'),
                    'move_out' => $date->addYears(rand(1, 10))->format('Y-m-d'),
                    'advance_amount' => rand(3000, 9000),
                    'rent_type' => $types[array_rand($types, 1)],
                    'rent_for' => rand(1, 30),
                    'rent_amount' => rand(20000, 70000),
                    'note' => 'this is a note',
                ]);
            }
        }


        $rentals = Rental::all();
        foreach ($rentals as $rental) {
            $tenant = PropertyTenant::find($rental->property_tenant_id);
            $tenant->rental_id = $rental->id;
            $tenant->save();
        }
    }
}
