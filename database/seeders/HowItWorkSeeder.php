<?php

namespace Database\Seeders;

use App\Models\HowItWork;
use Illuminate\Database\Seeder;

class HowItWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'title' => 'Manage Property Listings',
                'message' => 'Managing property listings typically involves creating and updating listings for properties that are available for sale or rent, including details such as property type, location, features, price, and photos or videos.',
                'bgcolor' => '#087c7c',
                'color' => '#fff',
            ],
            [
                'title' => 'Communicate With Clients',
                'message' => 'Communicating with clients is an important part of real estate transactions, and property buy and sell software can provide tools to help agents and brokers stay in touch with their clients throughout the process.',
                'bgcolor' => '#087c7c',
                'color' => '#fff',
            ],
            [
                'title' => 'Schedule Appointments ',
                'message' => 'Scheduling appointments is a key part of the real estate process, and property buy and sell software can help agents and brokers manage their schedules efficiently.',
                'bgcolor' => '#087c7c',
                'color' => '#fff',
            ],
            [
                'title' => 'Track Offers And Negotiations',
                'message' => 'Tracking offers and negotiations is an important part of real estate transactions, and property buy and sell software can provide tools to help agents and brokers stay on top of the process.',
                'bgcolor' => '#087c7c',
                'color' => '#fff',
            ],
        ];

        foreach ($list as $item) {
            HowItWork::create($item);
        }

    }
}
