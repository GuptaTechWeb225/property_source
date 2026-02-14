<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Database\Seeders\BlogSeeder;
use Database\Seeders\PageSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AboutSeeder;
use Database\Seeders\ImageSeeder;
use Database\Seeders\IncomeSeeder;
use Database\Seeders\RentalSeeder;
use Database\Seeders\SearchSeeder;
use Database\Seeders\AccountSeeder;
use Database\Seeders\ExpenseSeeder;
use Database\Seeders\PartnerSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\DocumentSeeder;
use Database\Seeders\FlagIconSeeder;
use Database\Seeders\HomePageSeeder;
use Database\Seeders\LanguageSeeder;
use Database\Seeders\PropertySeeder;
use Database\Seeders\WishlistSeeder;
use Database\Seeders\HowItWorkSeeder;
use Database\Seeders\HomeSliderSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\AppointmentSeeder;
use Database\Seeders\BankAccountSeeder;
use Database\Seeders\DesignationSeeder;
use Database\Seeders\BlogCategorySeeder;
use Database\Seeders\NotificationSeeder;
use Database\Seeders\PropertyTypeSeeder;
use Database\Seeders\PropertyCategorySeeder;
use Database\Seeders\EmergencyContactsSeeder;
use Database\Seeders\LandlordInstallerSeeder;
use Database\Seeders\PropertyFacilitiesSeeder;
use Database\Seeders\Property\TransactionSeeder;
use Database\Seeders\Property\PropertyTenantSeeder;
use Database\Seeders\Property\PropertyGallerySeeder;
use Database\Seeders\Property\PropertyFacilitySeeder;
use Database\Seeders\Property\PropertyFacilityTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_DEMO')) {
            $this->call([
                ImageSeeder::class,
                RoleSeeder::class,
                DesignationSeeder::class,
                UserSeeder::class,
                PermissionSeeder::class,
                FlagIconSeeder::class,
                LanguageSeeder::class,
                SettingSeeder::class,
                CurrencySeeder::class,
                SearchSeeder::class,
                HomePageSeeder::class,
                DocumentSeeder::class,

                CountrySeeder::class,
                StateSeeder::class,
                CitySeeder::class,

                //Start Property Gallery
                PropertyCategorySeeder::class,
                PropertySeeder::class,

                PropertyGallerySeeder::class,
                PropertyFacilityTypeSeeder::class,
                PropertyFacilitySeeder::class,
                PropertyTenantSeeder::class,
                // EmergencyContactsSeeder::class,
                RentalSeeder::class,

                HomeSliderSeeder::class,

                // Blog Seeder
                BlogCategorySeeder::class,
                BlogSeeder::class,

                //global


                BankAccountSeeder::class,
                AccountCategorySeeder::class,
                AccountSeeder::class,
                CategorySeeder::class,
                IncomeSeeder::class,
                ExpenseSeeder::class,

                WishlistSeeder::class,
                AboutSeeder::class,
                PartnerSeeder::class,
                AdvertisementSeeder::class,
                TransactionSeeder::class,
                HowItWorkSeeder::class,
                PageSeeder::class,
                NotificationSeeder::class,
                AppointmentSeeder::class,
                TimeSlotSeeder::class,
            ]);
        } else {
            $this->call([
                ImageSeeder::class,
                RoleSeeder::class,
                DesignationSeeder::class,
                UserSeeder::class,
                PermissionSeeder::class,
                FlagIconSeeder::class,
                LanguageSeeder::class,
                SettingSeeder::class,
                CurrencySeeder::class,
                HomePageSeeder::class,

                CountrySeeder::class,
                StateSeeder::class,
                CitySeeder::class,

                //Start Property Gallery
                PropertyCategorySeeder::class,

                PropertyFacilityTypeSeeder::class,
                PropertyFacilitySeeder::class,

                HomeSliderSeeder::class,

                //global
                CategorySeeder::class,
                AboutSeeder::class
            ]);
        }
    }
}
