<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings['application_name'] = env('APP_NAME');
        $settings['footer_text'] = '© 2024 LandLord . All Rights Reserved. Made By OnestTech.';
        $settings['file_system'] = 'local';
        $settings['mail_drive'] = 'smtp';
        $settings['mail_host'] = 'smtp.gmail.com';
        $settings['mail_address'] = 'sales@onesttech.com';
        $settings['from_name'] = 'Onest Kit';
        $settings['mail_username'] = '';
        $settings['mail_password'] = 'sales@onesttech.com';
        $settings['mail_port'] = '587';
        $settings['encryption'] = 'tls';
        $settings['default_langauge'] = 'en';
        $settings['light_logo'] = 'images/logo-white.png';
        $settings['dark_logo'] = 'images/logo.png';
        $settings['favicon'] = 'images/favicon.png';
        $settings['phone_number'] = '+8801959335555';
        $settings['email'] = 'sales@onesttech.com';
        $settings['facebook_link'] = '#';
        $settings['twitter_link'] = '#';
        $settings['linkedin_link'] = '#';
        $settings['instagram_link'] = '#';
        $settings['address'] = 'local';

        if (env('HUBOFHOMES_THEME')) {
            $settings['application_name'] = 'Hub of Home';
            $settings['footer_text'] = '©️2024 ®️Hub of Homes™️ a Trading Brand part of the Rockstar Estate Limited';

            $settings['light_logo'] = 'images/hub_favicon.png';
            $settings['dark_logo'] = 'images/hub_favicon.png';
            $settings['favicon'] = 'images/hub_favicon.png';
            $settings['phone_number'] = '02039212000';
            $settings['whatsapp_number'] = '+447851070654';
            $settings['email'] = 'info@hubofhomes.com';

            $settings['address'] = '35 Longbridge Road, Barking, IG11 8TN';

            $settings['mail_drive'] = 'smtp';
            $settings['mail_host'] = '';
            $settings['mail_address'] = 'info@hubofhomes.com';
            $settings['from_name'] = 'Hubofhomes';
            $settings['mail_username'] = '';
            $settings['mail_password'] = '';
            $settings['mail_port'] = '587';
            $settings['encryption'] = 'tls';
        }

        foreach ($settings as $name => $value) {
            Setting::updateOrCreate(
                ['name' => $name],
                [
                    'name' => $name,
                    'value' => $value,
                ]
            );
        }
    }
}
