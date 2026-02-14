<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Residential Properties',
                'slug' => Str::slug('Residential Properties'),
                'status' => Status::ACTIVE,
            ],
            [
                'title' => 'Commercial Properties',
                'slug' => Str::slug('Commercial Properties'),
                'status' => Status::ACTIVE,
            ],
            [
                'title' => 'Land for Sale',
                'slug' => Str::slug('Land for Sale'),
                'status' => Status::ACTIVE,
            ],
            [
                'title' => 'Apartments for Rent',
                'slug' => Str::slug('Apartments for Rent'),
                'status' => Status::ACTIVE,
            ],
            [
                'title' => 'Vacation Rentals',
                'slug' => Str::slug('Vacation Rentals'),
                'status' => Status::ACTIVE,
            ],
        ];

        DB::table('blog_categories')->insert($categories);
    }
}
