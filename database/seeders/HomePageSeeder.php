<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_pages')->insert([
            'business_model_title'=> 'Process Flow for our business model',
            'business_model_description'=> 'A smart accounting software for rental property landlords automates rental income tracking, expense management, and reporting for rental properties.',
            'business_model_link'=> '#',
            'feature_title' => 'Grab your software with amazing features',
            'feature_description'=> 'Real estate refers to the buying, selling, and renting of properties, including residential, commercial, and industrial buildings and land.',
            'howitworks_title'=> 'How it works?',
            'howitworks_description'=> 'Accounting software for rental landlords streamlines financial management by automating data entry, tracking income & expenses, generating reports.',
            'app_store_link'=> '#',
            'play_store_link'=> '#',
            'testimonial_title'=> 'Love from out clients around the world',
            'testimonial_description'=> 'Clients say our smart accounting software saves time, improves accuracy and simplifies reporting for rental property landlords.',
            'blogs_title'=> 'What’s New?',
            'blogs_description'=> 'Our blog showcases the benefits of using a smart accounting software for rental property landlords, from streamlining financial management to saving time.',
        ]);
    }
}
