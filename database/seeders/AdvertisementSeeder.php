<?php

namespace Database\Seeders;

use App\Models\Property\PropertyCategory;
use App\Models\User;
use App\Services\NotificationService;
use Carbon\Carbon;
use App\Enums\Status;
use App\Enums\DealType;
use App\Enums\ApprovalStatus;
use App\Models\Advertisement;
use Illuminate\Database\Seeder;
use App\Models\Property\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Auth;
use Faker\Factory as Faker;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $faker = Faker::create();

            // Assuming you have 20 properties
            $properties = Property::get();

            foreach ($properties as $property) {
                // Get a random user from the users table
                $randomUser = User::where('role_id', 5)->inRandomOrder()->first();

                $advertisementStore = new Advertisement();
                $advertisementStore->advertisement_type = rand(1,5);
                $advertisementStore->user_id = $randomUser->id; // Assign random user_id
                $advertisementStore->property_id = $property->id;
                $advertisementStore->property_creator_id = $property->user_id;
                $advertisementStore->booking_amount = $faker->randomFloat(2, 50, 500); // Random booking amount

                if ($advertisementStore->advertisement_type == DealType::RENT){
                    $advertisementStore->rent_amount = $faker->randomFloat(2, 100, 1000); // Random rent amount
                    $advertisementStore->rent_type = rand(1,2);
                    $advertisementStore->rent_start_date = $faker->dateTimeBetween('-30 days', 'now');
                    $advertisementStore->rent_end_date = $faker->dateTimeBetween('now', '+30 days');
                }

                if($advertisementStore->advertisement_type == DealType::SELL){
                    $advertisementStore->sell_start_date = $faker->dateTimeBetween('-30 days', 'now');
                    $advertisementStore->sell_amount = $faker->randomFloat(2, 5000, 50000); // Random sell amount
                }
                if ($advertisementStore->advertisement_type == DealType::MORTGAGE){
                    $advertisementStore->mortgage_duration = rand(15, 365);
                    $advertisementStore->mortgage_amount = $faker->randomFloat(2, 5000, 50000);
                }
                if ($advertisementStore->advertisement_type == DealType::LEASE){
                    $advertisementStore->lease_duration = rand(15, 365);
                    $advertisementStore->lease_amount = $faker->randomFloat(2, 5000, 50000);
                }

                $advertisementStore->terms_condition = $faker->paragraph(10);
                $advertisementStore->negotiable = $faker->boolean();
                $advertisementStore->approval_status = ApprovalStatus::APPROVED;
                $advertisementStore->save();
            }
        }catch (\Exception $exception){
            return false;
        }
    }
}
