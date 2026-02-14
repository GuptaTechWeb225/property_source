<?php

namespace Database\Seeders\Property;

use Illuminate\Database\Seeder;
use App\Models\Property\Property;
use App\Models\Property\PropertyFacility;
use App\Models\Property\PropertyFacilityType;

class PropertyFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $facilities = [
            'Electricity' => 'Yes',
            'Gas' => 'Yes',
            'Internet' => 'Yes',
            'Lift' => 'Yes',
            'Parking' => '1',
            'Water' => 'Available',
            'Balcony' => '3',
            'Bath' => '3',
            'Bed' => '3',
        ];

        $properties = Property::all();
        foreach ($properties as $property) {
            $property_facilities = PropertyFacilityType::all();
            foreach ($property_facilities as $property_facility) {
                $newPropertyFacility                            = new PropertyFacility();
                $newPropertyFacility->property_id               = $property->id;
                $newPropertyFacility->property_facility_type_id = $property_facility->id;
                $newPropertyFacility->status                    = 1;
                $newPropertyFacility->content                   = $facilities[$property_facility->name];
                $newPropertyFacility->save();
            }
        }

    }
}
