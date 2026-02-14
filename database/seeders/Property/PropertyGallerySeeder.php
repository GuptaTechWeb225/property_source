<?php

namespace Database\Seeders\Property;

use App\Models\Image;
use App\Models\Property\Property;
use App\Models\Property\PropertyGallery;
use Illuminate\Database\Seeder;

class PropertyGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     $lists = [
    //         'frontend/img/galleryLarge/1.png',
    //         'frontend/img/galleryLarge/2.png',
    //         'frontend/img/galleryLarge/3.png',
    //         'frontend/img/galleryLarge/4.png',
    //         'frontend/img/galleryLarge/5.png',
    //     ];
    //     foreach ($lists as $key => $list) {
    //         $image = Image::create([
    //             'path' => $list,
    //         ]);
    //         $uploaded_ids[] = $image->id;
    //     }

    //     $properties = Property::all();
    //     foreach ($properties as $key => $property) {
    //         foreach ($uploaded_ids as $key => $uploaded_id) {
    //             $newPropertyGallery = new PropertyGallery();
    //             $newPropertyGallery->title = 'Property Gallery ' . $key + 1;
    //             $newPropertyGallery->property_id = $property->id;
    //             $newPropertyGallery->image_id = $uploaded_id;
    //             $newPropertyGallery->status = 1;
    //             $newPropertyGallery->is_default = 0;
    //             $newPropertyGallery->serial = $key + 1;
    //             $newPropertyGallery->type = 'gallery';
    //             $newPropertyGallery->save();
    //         }
    //     }

    //     // Floor Plan
    //     $lists = [
    //         'frontend/img/floorMap/floor_1.png',
    //         'frontend/img/floorMap/floor_2.png',
    //         'frontend/img/floorMap/floor_3.png',
    //         'frontend/img/floorMap/floor_4.png',
    //         'frontend/img/floorMap/floor_5.png',
    //     ];
    //     foreach ($lists as $key => $list) {
    //         $image = Image::create([
    //             'path' => $list,
    //         ]);
    //         $uploaded_floor_ids[] = $image->id;
    //     }

    //     $properties = Property::all();
    //     foreach ($properties as $key => $property) {
    //         foreach ($uploaded_floor_ids as $key => $uploaded_id) {
    //             $newPropertyGallery = new PropertyGallery();
    //             $newPropertyGallery->title = 'Property Floor Plan ' . $key + 1;
    //             $newPropertyGallery->property_id = $property->id;
    //             $newPropertyGallery->image_id = $uploaded_id;
    //             $newPropertyGallery->status = 1;
    //             $newPropertyGallery->is_default = 0;
    //             $newPropertyGallery->serial = $key + 1;
    //             $newPropertyGallery->type = 'floor_plan';
    //             $newPropertyGallery->save();
    //         }
    //     }

    }
}
