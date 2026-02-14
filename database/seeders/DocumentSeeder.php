<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Image;
use App\Models\Document;
use Illuminate\Database\Seeder;
use App\Models\Property\Property;
use Illuminate\Support\Facades\Schema;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users=User::whereIn('role_id', [4,5])->get();

        foreach ($users as $user) {

            $image = new Image();
            $image->path = 'assets/documents/sample.pdf';
            $image->save();

            $document = new \App\Models\Document();
            $document->filename = 'sample.pdf';
            $document->attachment_table = 'tenant';
            $document->attachment_table_id = $user->id;
            $document->user_id = $user->id;
            $document->attachment_id = $image->id;
            $document->save();
        }

        $properties = Property::all();

        foreach ($properties as $property) {

            $image = new Image();
            $image->path = 'assets/documents/sample.pdf';
            $image->save();

            $document = new Document();
            $document->filename = 'sample.pdf';
            $document->attachment_table = 'properties';
            $document->attachment_table_id = $property->id;
            $document->user_id = $property->user_id;
            $document->attachment_id = $image->id;
            $document->save();
        }

    }
}
