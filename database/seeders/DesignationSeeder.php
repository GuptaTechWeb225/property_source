<?php

namespace Database\Seeders;

use App\Models\Hrm\Designation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = [
            'HRM',
            'Admin',
            'Accounts',
            'Development',
            'Software',
            'Land Lord',
            'Tenant'
        ];

        foreach ($designations as $designation) {
            Designation::create([
                'title' => $designation
            ]);
        }
    }
}
