<?php

namespace Database\Seeders;

use App\Models\EmergencyContact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Property\PropertyTenant;


class EmergencyContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = PropertyTenant::all();
        foreach ($tenants as $tenant) {
            $data = [
                [
                    'name' => 'Sarah Johnson',
                    'phone' => '+1 (123) 456-7890',
                    'relation' => 'Brother',
                    'email' => 'sarah.johnson@example.com',
                    'image_id' => 124,
                    'occupied' => 'businessman',
                ],
                [
                    'name' => 'Adam Lee',
                    'phone' => '+1 (234) 567-8901',
                    'relation' => 'Sister',
                    'email' => 'adam.lee@example.com',
                    'image_id' => 259,
                    'occupied' => 'Engineer',
                ],
                [
                    'name' => 'Emily Davis',
                    'phone' => '+1 (345) 678-9012',
                    'relation' => 'Father',
                    'email' => 'emily.davis@example.com',
                    'image_id' => 376,
                    'occupied' => 'businessman',
                ],
                [
                    'name' => 'Michael Thompson',
                    'phone' => '+1 (456) 789-0123',
                    'relation' => 'Mother',
                    'email' => 'michael.thompson@example.com',
                    'image_id' => 423,
                    'occupied' => 'businessman',
                ],
                [
                    'name' => 'Sophia Hernandez',
                    'phone' => '+1 (567) 890-1234',
                    'relation' => 'Brother',
                    'email' => 'sophia.hernandez@example.com',
                    'image_id' => 555,
                    'occupied' => 'service holder',
                ],
                [
                    'name' => 'James Kim',
                    'phone' => '+1 (678) 901-2345',
                    'relation' => 'Sister',
                    'email' => 'james.kim@example.com',
                    'image_id' => 662,
                    'occupied' => 'Banker',
                ],
                [
                    'name' => 'Ashley Nguyen',
                    'phone' => '+1 (789) 012-3456',
                    'relation' => 'Mother',
                    'email' => 'ashley.nguyen@example.com',
                    'image_id' => 713,
                    'occupied' => 'Manager',
                ],
                [
                    'name' => 'Dylan Patel',
                    'phone' => '+1 (890) 123-4567',
                    'relation' => 'Brother',
                    'email' => 'dylan.patel@example.com',
                    'image_id' => 879,
                    'occupied' => 'businessman',
                ]
            ];
            // $contacts = PropertyTenant::where('id', $tenant->user_id)->get();
            $types = ['emergency', 'reference'];

            foreach ($data as $innerArray) {
                EmergencyContact::create([
                    'property_tenant_id' => $tenant->id,
                    'name' => $innerArray['name'],
                    'relation' => $innerArray['relation'],
                    'phone' => $innerArray['phone'],
                    'email' => $innerArray['email'],
                    'image_id' => rand(1,10),
                    'occupied' => $innerArray['occupied'],
                    'type' => $types[array_rand($types, 1)]
                ]);
            }

        }
    }
}
