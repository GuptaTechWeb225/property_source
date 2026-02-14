<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;
use App\Models\Property\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $users= User::get();
         $Properties = Property::all();

         foreach ($users as $user) {
             foreach ($Properties as $Property) {
                 Wishlist::create([
                     'user_id' => $user->id,
                     'property_id' => $Property->id,
                 ]);
             }
             foreach ($Properties as $Property) {
                 Wishlist::create([
                     'user_id' => $user->id,
                     'property_id' => $Property->id,
                 ]);
             }
         }
    }
}
