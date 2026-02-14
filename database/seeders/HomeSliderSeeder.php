<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\HeroSection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Slider Image
        $lists = [
            'backend/uploads/heroSections/default-slider.svg',
            'backend/uploads/heroSections/default-slider.svg',
            'backend/uploads/heroSections/default-slider.svg',
        ];

        if (env('APP_DEMO')){
            $lists = [
                'backend/uploads/heroSections/hero3.png',
                'backend/uploads/heroSections/home_banner_1.jpg',
                'backend/uploads/heroSections/home_banner_2.jpg',
            ];
        }

        if (env('HUBOFHOMES_THEME')){
            $lists = [
                'backend/uploads/heroSections/home_banner_1-prev.jpg',
                'backend/uploads/heroSections/home_banner_2-prev.jpg',
                'backend/uploads/heroSections/home_banner_3-prev.jpg',
            ];
        }


        foreach ($lists as $key => $list) {
            $image = Image::create([
                'path' => $list,
            ]);
            $uploaded_slider_img[] = $image->id;
        }

        HeroSection::create([
            'title' => 'Welcome to Our Website',
            'highlight_title_one' => 'Find your dream home',
            'btn_one' => '#',
            'image_id' => $uploaded_slider_img[0],
            'status' => 1,
        ]);

        HeroSection::create([
            'title' => 'Explore Our Featured Properties',
            'highlight_title_one' => 'Luxury Apartments',
            'btn_one' => '#',
            'image_id' => $uploaded_slider_img[1],
            'status' => 1,
        ]);

        HeroSection::create([
            'title' => 'Get in Touch with Us Today',
            'highlight_title_one' => 'Need Help with Buying or Selling?',
            'btn_one' => '#',
            'image_id' => $uploaded_slider_img[2],
            'status' => 1,
        ]);
    }
}
