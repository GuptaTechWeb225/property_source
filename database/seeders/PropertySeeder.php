<?php

namespace Database\Seeders;

use App\Models\City;
use Faker\Factory;
use App\Models\User;
use App\Models\Image;
use App\Models\Document;
use App\Models\Locations\Country;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Locations\Upazila;
use App\Models\Property\Property;
use App\Models\Locations\District;
use App\Models\Locations\Division;
use Illuminate\Support\Facades\Auth;
use App\Models\Property\PropertyTenant;
use App\Models\Property\PropertyGallery;
use App\Models\Property\PropertyCategory;
use App\Models\Property\PropertyLocation;
use App\Models\State;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $properties = [
                [
                    'name' => 'Massive King Size Bedroom',
                    'rent_amount' => 1150,
                    'address' => 'Shoebury rd East Ham London E6 2AQ',
                    'default_image' => 'assets/property/1/pi1-1.jpg',
                    'description' => 'A single room is availble to let right next to Canary Wharf ,around 10 minutes walk comes with Fully furnished and beautifully decorated house ,there are plenty of shops , restaurants and cafes all around the house , Its very close to Canary wharf therefore Ideal for working professionals , House has Fully Functional kitchen , 2 Full Bathrooms and fridge , oven , microwave , kettle and Toaster etc. The Good thing is it comes with all Bills Inclusive so its a great relief being of bills inclusive , We work until late so please reach out to us at your availbility and a whatsapp communication will be preffered. there are couple of rooms single and Large Double rooms.',
                ],
                [
                    'name' => 'Sections Of rooms with Bills From £650-£850',
                    'rent_amount' => 650,
                    'default_image' => 'assets/property/2/pi2-1.jpg',
                    'address' => 'Ferry Street Canary Wharf London E14 3DT',
                    'description' => 'A Massive Selection of Single, Double and King Size rooms with bills right next to east ham station , the house is newly done from bottom to top so the quality of house is guaranteed , Another plus is its all bills are inclusive so to save a lot of unforeseen situations with bills . Kindly Note that we are looking for Full time working professionals and super clean responsible individuals so kindly take this into considerations before coming for the viewings , Kindly Note we are only looking for serious people looking to move in asap and looking for long term .Kindly note that there are multiple rooms starting in the range £650-£1050 and some rooms pics might not be there in the advert. a couple may be considered on additional payment.',
                ],
                [
                    'name' => 'King Size Room with Bills £800',
                    'rent_amount' => 800,
                    'default_image' => 'assets/property/3/pi3-1.jpg',
                    'address' => 'Fairead Garden Redbridge IG4 5BP',
                    'description' => 'Beautiful King Size Rooms available in a shared house for single occupancy only and will be available soon , the house Right next to Redbridge Station on central Line very close about 5 minutes walk, House is Fully Furnished and fairly newly in condition refurbished to the highest standards, Its ideal for working professionals and is available to move immediately upon the right match , House is Fully equipped with necessary household items like microwave, kettle, toaster, fridge and washing machine etc and more importantly with 3 bathrooms along with super large and beautifully maintained garden and lot of open spaces around the kitchen , dinner as it has 2 open receptions rooms equipped with large sofas , dining table, there are supermarkets round the corner local shops around. Kindly communicate on whatsapp messages for immediate and effective as well easier communication and quick response, kindly note that the place is for single occupancy and male preferred please,',
                ],
                [
                    'name' => 'Massive Ensuite With Bills £1000',
                    'rent_amount' => 1000,
                    'default_image' => 'assets/property/4/pi4-1.jpg',
                    'address' => 'Longbridge rd Barking IG11 8SU',
                    'description' => 'Super Nece and Super Large Studio Style Ensuit rooms with private Bathroom and Private Fridge fully furnished to the highest standards in a shared House with a garden suitable for working professionals , fully equipped with and a lots of storage , Nice super fast fiber optic broadband with all the other bills inclusive in the rent . leisure centre, superstores , restaurants and pubs along with high street round the corner , location of the house is amazing right in front of the barking park, other than that it\'s more like private so you do not have to deal with high street agencies and you will be served with single point of the contact right from beginning to the end so you know who to contact. its equipped with all the basic amenities like fridge, , washing machine kettle toaster etc. just to quick and fast response kindly communicate through whatsapp or phone for further communication,',
                ],
                [
                    'name' => 'Massive King Size Room with Bills £1050',
                    'rent_amount' => 1050,
                    'default_image' => 'assets/property/5/pi5-1.jpg',
                    'address' => 'Disraeli rd E7 9JP',
                    'description' => 'Beautiful Large double room will be available to move in very close to stratford just off Romford road where you can find buses round the corner 24x7 and underground and overground just walking distance House is very decent condition and refurbished and furnished so all basic furniture is provided , its fully furnished like bed, mattress, cupboard and chest of drawer along with TV in each room ,The house has massive front and back garden so its really impressive and attractive to look for , All the super markets and high street banks ,Mcd and chain store all are around the corner , also it comes with all the bills inclusive so its really a great help to avoid any adventure. Kindly feel free to contact at your availbility to organise a viewing ASAP. We serve the community until late so feel free to contact us at your availability and in addition to have a single point of contact from beginning till the end so just to know who to conatct.',
                ],
                [
                    'name' => 'Selection Of ensuites with Bills £850-£950',
                    'rent_amount' => 850,
                    'default_image' => 'assets/property/6/pi6-1.jpg',
                    'address' => 'Aldersey Garden Barking IG11 9UG',
                    'description' => 'Double & Large Large Double Studio En suite with private Full bathroom , private fridge and a private television suitable for working professional The place comes with fully furnished and beautifully decorated in a shared House with a garden , fully equipped with 3 Kitchen cooking Facilities along with oven , Nice super-fast 1000 Meg fiber optic broadband with all the other bills inclusive in the rent . Gym ,leisure center, superstores , restaurants and pubs along with high street round the corner , other than that it’s more like private so you do not have to deal with high street agencies, and you will be served with single point of the contact right from beginning to the end, so you know who to contact the place is right next to barking station literally 3-4 minutes walk where you can find district and hammersmith and city line along with C2C services apart from that it\'s right in front of barking park so you can easily enjoy the natural stuff , Couple can be accepted on additional payment.',
                ],
                [
                    'name' => 'Massive King Size Room Available to Let',
                    'rent_amount' => 1050,
                    'default_image' => 'assets/property/7/pi7-1.jpg',
                    'address' => 'Fisher Close Rotherhithe SE16 5AD',
                    'description' => 'Hi everyone, Massive Selections of Double king size and king size Ensuite Room available in superb location of Rotherhithe just minutes away from canada water shopping center and next to Russian wood as well as just minutes away from River Thames , it\'s very well connected via train and buses round the corner . The place it’s Fairy new build and there are plenty of professionals around the area and is fully furnished and will be ready to move in soon . The quality of the house is unbelievable being a fairly new development, kindly note that we are looking for short term and not for too long so kindly organise the viewing at your availability , kindly note that price varies on rooms fromm£1050-£1250.'
                ],
                [
                    'name' => 'Elegant 2-bedroom apartment with balcony near Gerusalemme metro station, Milan, Milan',
                    'rent_amount' => 4120,
                    'default_image' => 'assets/property/8/pi8-1.jpg',
                    'address' => 'Fisher Close Rotherhithe SE16 5AD',
                    'description' => 'N.B. only for our properties located in Milan: for the bookings with check-in between March 12th and April 23th 2024, an extra month rent must be paid in advance and won\'t be refundable. The check out between 11th April and 21st April 2024 included is not allowed.'
                ],
                [
                    'name' => 'Pretty one-bedroom apartment near Gerusalemme metro station',
                    'rent_amount' => 2350,
                    'default_image' => 'assets/property/9/pi9-1.jpg',
                    'address' => 'Fisher Close Rotherhithe SE16 5AD',
                    'description' => 'The price shown includes: VAT10 percent, utilities (electricity and gas up to a maximum daily amount), assisted check-in, internet Wi-fi.'
                ],
                [
                    'name' => 'Matije Vlacica Flaciusa 73',
                    'rent_amount' => 1560,
                    'default_image' => 'assets/property/10/pi10-1.jpg',
                    'address' => 'Fisher Close Rotherhithe SE16 5AD',
                    'description' => 'Apartment type: A2. 2 bed/s for adults. Number of extra beds 2. Apartment capacity (adults): (2+2). Category of apartment is 3 stars. Apartment size is 38 m2. The apartment is on the first floor. Access for the disabled is not enabled. Number of bedrooms in the apartment: 1. Number of bathrooms in the apartment: 1. Number of balconies in the apartment: 1.'
                ],
            ];

            $user = User::where('role_id', 4)->inRandomOrder()->first();

            $categories = PropertyCategory::select('id', 'name')->get();

            foreach ($categories as $category) {
                foreach ($properties as $key => $item) {
                    $key += 1;
                    $property = Property::create([
                        'name' => $item['name'],
                        'slug' => Str::slug($item['name']) . '-' . Str::random(5),
                        'size' => 500 + rand(0, 1000),
                        'dining_combined' => 'yes',
                        'bedroom' => 1 + rand() % 3,
                        'bathroom' => 1 + rand() % 3,
                        'rent_amount' => $item['rent_amount'],
                        'flat_no' => 'A10' . rand() % 9,
                        'description' => $item['description'],
                        'vacant' => 1,
                        'completion' => rand(0, 1),
                        'deal_type' => rand(0, 1),
                        'status' => 1,
                        'type' => rand(0, 1),
                        'user_id' => $user->id,
                        'default_image' => $this->makeImage($item['default_image']),
                        'property_category_id' => $category->id,
                        'total_unit' => 1,
                        'total_occupied' => 0,
                        'total_rent' => 1 + rand() % 3,
                        'total_sell' => 1 + rand() % 3,
                        'discount_type' => 'fixed',
                        'discount_amount' => rand(10, 100),
                        'is_trending' => $key < 4 ? 1 : 0,
                        'is_populer' => $key < 4 ? 1 : 0,
                        'is_recommended' => $key < 4 ? 1 : 0,
                        'is_most_populer' => $key < 4 ? 1 : 0,
                    ]);

                    $duration['start_date'] = \Carbon\Carbon::parse('2015-01-01');
                    $duration['end_date'] = \Carbon\Carbon::parse('2018-12-31');

                    // START:: property tenant create
                    $user_id = User::where('role_id', 5)->inRandomOrder()->first()->id;
                    $_tenant = new PropertyTenant;
                    $_tenant->property_id = $property->id;
                    $_tenant->user_id = $user_id;
                    $_tenant->landowner_id = $property->user_id;
                    $_tenant->emergency_contact_id = 1;
                    $_tenant->start_date = $duration['start_date'];
                    $_tenant->end_date = $duration['end_date'];
                    $_tenant->status = 1;
                    $_tenant->save();

                    for ($i = 1; $i <= 10; $i++) {
                        $newPropertyGallery = new PropertyGallery();
                        $newPropertyGallery->title = $property->name;
                        $newPropertyGallery->property_id = $property->id;
                        $newPropertyGallery->image_id = $this->makeImage("assets/property/$key/pi$key-$i.jpg");
                        $newPropertyGallery->status = 1;
                        $newPropertyGallery->is_default = 0;
                        $newPropertyGallery->serial = $i - 1;
                        $newPropertyGallery->type = 'gallery';
                        $newPropertyGallery->save();
                    }

                    // floor_plan
                    $newPropertyGallery = new PropertyGallery();
                    $newPropertyGallery->title = $property->name;
                    $newPropertyGallery->property_id = $property->id;
                    $newPropertyGallery->image_id = $this->makeImage("assets/property/$key/floor_plan.webp");
                    $newPropertyGallery->status = 1;
                    $newPropertyGallery->is_default = 0;
                    $newPropertyGallery->serial = 1;
                    $newPropertyGallery->type = 'floor_plan';
                    $newPropertyGallery->save();


                    $city = City::inRandomOrder()->first();
                    $state = State::inRandomOrder()->first();
                    $country = Country::inRandomOrder()->first();

                    PropertyLocation::create([
                        'property_id' => $property->id,
                        'state_id' => $state->id,
                        'city_id' => $city->id,
                        'country_id' => $country->id,
                        'post_code' => 'ab12012',
                        'user_id' => $user->id,
                        'address' => $item['address'],
                    ]);
                }
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
    }

    public function makeImage($path)
    {
        $image = Image::create([
            'path' => $path,
        ]);
        return $image->id;
    }
}
