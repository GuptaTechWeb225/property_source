<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use App\Models\Property\PropertyCategory;

class PropertyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $image_list = [
            'assets/categories/Apartment.png',
            'assets/categories/Building.png',
            'assets/categories/Office.png',
            'assets/categories/Cabin.png',
            'assets/categories/villa.png',
            'assets/categories/Land.png',
        ];
        $icon_list  = [
            'ri-community-line',
            'ri-building-2-line',
            'ri-folder-4-line',
            'ri-community-line',
            'ri-cake-2-line',
            'ri-hotel-line',
        ];
        foreach ($image_list as $key => $list) {
            $image = Image::create([
                'path' => $list,
            ]);
            $uploaded_property_category[] = $image->id;
        }

        // array of property types
        $property_types = [
            'Apartment',
            'Building',
            'Office',
            'Room',
            'Flat',
            'Land',
        ];


        // loop through property types
        foreach ($property_types as $key => $type) {
            PropertyCategory::create([
                'name'        => $type,
                'slug'        => strtolower(str_replace(' ', '-', $type)),
                'image_id'    => $uploaded_property_category[$key],
                'icon_class'    => $icon_list[$key],
                'status'      => 1,
                'serial'      => null,
                'is_featured' => $key < 3 ? 1 : 0 ,
            ]);
        }
    }
}
