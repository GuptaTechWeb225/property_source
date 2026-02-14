<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $lists = [
            'frontend/img/o_land_brand/pertner.png',
            'frontend/img/o_land_brand/pertner.png',
            'frontend/img/o_land_brand/pertner.png',
            'frontend/img/o_land_brand/pertner.png',
            'frontend/img/o_land_brand/pertner.png',
            'frontend/img/o_land_brand/pertner.png',
            'frontend/img/o_land_brand/pertner.png',
            'frontend/img/o_land_brand/pertner.png',
            'frontend/img/o_land_brand/pertner.png',
            'frontend/img/o_land_brand/pertner.png',
        ];
        if (env('APP_DEMO')){
            $lists = [
                'frontend/img/o_land_brand/1.jpeg',
                'frontend/img/o_land_brand/2.jpeg',
                'frontend/img/o_land_brand/3.jpeg',
                'frontend/img/o_land_brand/4.jpeg',
                'frontend/img/o_land_brand/5.jpeg',
                'frontend/img/o_land_brand/6.jpeg',
                'frontend/img/o_land_brand/7.png',
                'frontend/img/o_land_brand/8.png',
                'frontend/img/o_land_brand/9.png',
                'frontend/img/o_land_brand/10.png',
            ];
        }

        if (env('HUBOFHOMES_THEME')){
            $lists = [
                'frontend/img/o_land_brand/1.jpeg',
                'frontend/img/o_land_brand/my_deposits.png',
                'frontend/img/o_land_brand/cmp.jpg',
                'frontend/img/o_land_brand/nla.png',
                'frontend/img/o_land_brand/ico.jpeg',
            ];
        }

        foreach ($lists as $key => $list) {
            $image = Image::create([
                'path' => $list,
            ]);
            $uploaded_partner_img[] = $image->id;
        }

        $partners = [];
        for ($i = 0; $i < count($lists); $i++) {
            $partners[] = [
                'name' => 'Partner' . $i,
                'image_id' => $uploaded_partner_img[$i],
                'status' => '1',
            ];
        }

        Partner::insert($partners);
    }
}
