<?php

namespace Database\Seeders;

use App\Enums\Status;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Income categories and sub-categories
         $income_data = [
            ["category" => "Salary", "subcategory" => "Full-time"],
            ["category" => "Salary", "subcategory" => "Part-time"],
            ["category" => "Freelance", "subcategory" => "Writing"],
            ["category" => "Freelance", "subcategory" => "Graphic design"],
            ["category" => "Investment", "subcategory" => "Stocks"],
            ["category" => "Investment", "subcategory" => "Real estate"],
            // add more categories and sub-categories as needed
        ];

        // Expense categories and sub-categories
        $expenses = [
            "Food" => ["Groceries", "Eating Out"],
            "Transportation" => ["Gas", "Public Transportation", "Car Maintenance"],
            "Housing" => ["Rent", "Mortgage", "Utilities"],
            "Entertainment" => ["Movies", "Concerts", "Sports"],
            "Personal Care" => ["Haircut", "Toiletries"],
            // add more categories and sub-categories as needed
        ];

        // Create income categories and sub-categories
        foreach ($income_data as $income) {
            $category = Category::create([
                'title' => $income['subcategory'],
                'subtitle' => $income['category'],
                'type' => 'income',
                'slug' => Str::slug($income['subcategory']),
                'status' => Status::ACTIVE,
            ]);
        }

        // Create expense categories and sub-categories
        foreach ($expenses as $category_title => $subcategories) {
            $category = Category::create([
                'title' => $category_title,
                'type' => 'expense',
                'slug' => Str::slug($category_title),
                'status' => Status::ACTIVE,
            ]);
            foreach ($subcategories as $subcategory_title) {
                $subcategory = Category::create([
                    'title' => $subcategory_title,
                    'subtitle' => $category_title,
                    'type' => 'expense',
                    'slug' => Str::slug($subcategory_title),
                    'parent_id' => $category->id,
                    'status' => Status::ACTIVE,
                ]);
            }
        }

    }
}
