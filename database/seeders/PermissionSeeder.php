<?php

namespace Database\Seeders;

use App\Utils\Utils;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Utils::permissions() as $attribute => $keywords) {
            Permission::updateOrCreate(
                [
                    'attribute' => $attribute
                ],
                [
                    'keywords' => $keywords
                ]
            );
        }
    }
}
