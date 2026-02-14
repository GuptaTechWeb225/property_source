<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\Status;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_DEMO')){
            Page::create([
                "user_id" => 1,
                "title" => 'Privacy Policy',
                "slug" => 'privacy-policy',
                "content" => 'This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data',
                "serial" => 1,
                "show_menu" => 0,
                'parent_id' => null,
            ]);
            Page::create([
                "user_id" => 1,
                "title" => 'Terms and Conditions',
                "slug" => 'terms-and-conditions',
                "content" => 'These Terms and Conditions ("Terms", "Terms and Conditions") govern your use of the Landlord website (the "Service") operated by [Your Company Name] ("us", "we", or "our").',
                "serial" => 1,
                "show_menu" => 0,
                'parent_id' => null,
            ]);
        }
        // hubofhomes content page
        if (env('HUBOFHOMES_THEME')){
            $file = public_path('contents_data.php');
            if (filectime($file)){
                $contents = include($file);
                foreach ($contents as $record) {
                    $this->insertWithChildren($record, null);
                }
            }
        }
    }

    private function insertWithChildren($record, $parentId)
    {
        $parent = Page::create([
            "user_id" => 1,
            "title" => $record['title'],
            "slug" => $record['slug'],
            "content" => $record['content'],
            "serial" => $record['serial'],
            "show_menu" => $record['show_menu'],
            'parent_id' => $parentId,
            // Add more columns as needed
        ]);

        // Check if the record has children
        if (isset($record['children']) && is_array($record['children'])) {
            foreach ($record['children'] as $childRecord) {
                $this->insertWithChildren($childRecord, $parent->id);
            }
        }
    }
}
