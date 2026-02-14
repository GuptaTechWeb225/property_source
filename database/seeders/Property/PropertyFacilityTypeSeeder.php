<?php

namespace Database\Seeders\Property;

use App\Models\Image;
use Illuminate\Database\Seeder;
use App\Models\Property\PropertyFacilityType;

class PropertyFacilityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $property_facility_types = [
            [
                'name' => 'Electricity',
                'icon' => 'fas fa-check',
                'image' => 'assets/facilities/electric.png',
            ],
            [
                'name' => 'Gas',
                'icon' => 'fas fa-check',
                'image' => 'assets/facilities/gas.png',
            ],
            [
                'name' => 'Internet',
                'icon' => 'fas fa-check',
                'image' => 'assets/facilities/internet.png',
            ],
            [
                'name' => 'Lift',
                'icon' => 'fas fa-check',
                'image' => 'assets/facilities/lift.png',
            ],
            [
                'name' => 'Parking',
                'icon' => 'fas fa-check',
                'image' => 'assets/facilities/parking.png',
            ],
            [
                'name' => 'Water',
                'icon' => 'fas fa-check',
                'image' => 'assets/facilities/water.png',
            ],
            [
                'name' => 'Balcony',
                'icon' => 'fas fa-check',
                'image' => 'assets/facilities/balcony.png',
            ],
            [
                'name' => 'Bath',
                'icon' => 'fas fa-check',
                'image' => 'assets/facilities/bath.png',
            ],
            [
                'name' => 'Bed',
                'icon' => 'fas fa-check',
                'image' => 'assets/facilities/bed.png',
            ],
        ];



        foreach ($property_facility_types as $property_facility_type) {

            $image = new Image();
            $image->path = $property_facility_type['image'];
            $image->save();

            $newPropertyFacilityType = new PropertyFacilityType();
            $newPropertyFacilityType->name = $property_facility_type['name'];
            $newPropertyFacilityType->icon = $property_facility_type['icon'];
            $newPropertyFacilityType->image_id = $image->id;
            $newPropertyFacilityType->status = 1;
            $newPropertyFacilityType->save();
        }
    }
}
