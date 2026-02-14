<?php

namespace App\Providers;

use App\Interfaces\FqaInterface;
use App\Interfaces\LeadershipInterface;
use App\Interfaces\OfferInterface;
use App\Interfaces\RequirementInterface;
use App\Interfaces\RoleInterface;
use App\Interfaces\UserInterface;
use App\Interfaces\AboutInterface;
use App\Interfaces\BlogsInterface;
use App\Interfaces\OrderInterface;
use App\Interfaces\IncomeInterface;
use App\Interfaces\RentalInterface;
use App\Interfaces\TenantInterface;
use App\Interfaces\AccountInterface;
use App\Interfaces\CountryInterface;
use App\Interfaces\ExpenseInterface;
use App\Interfaces\FeatureInterface;
use App\Interfaces\SettingInterface;
use App\Repositories\FaqRepository;
use App\Repositories\LeadershipRepository;
use App\Repositories\OfferRepository;
use App\Repositories\RequirementRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Interfaces\CategoryInterface;
use App\Interfaces\FlagIconInterface;
use App\Interfaces\HomePageInterface;
use App\Interfaces\LanguageInterface;
use App\Interfaces\PartnersInterface;
use App\Interfaces\PropertyInterface;
use App\Repositories\AboutRepository;
use App\Repositories\BlogsRepository;
use App\Repositories\OrderRepository;
use App\Interfaces\CommitteeInterface;
use App\Interfaces\HowItWorkInterface;
use App\Repositories\IncomeRepository;
use App\Repositories\RentalRepository;
use App\Repositories\TenantRepository;
use App\Interfaces\PermissionInterface;
use App\Repositories\AccountRepository;
use App\Repositories\CountryRepository;
use App\Repositories\ExpenseRepository;
use App\Repositories\FeatureRepository;
use App\Repositories\SettingRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\HeroSectionInterface;
use App\Interfaces\Hrm\HolidayInterface;
use App\Interfaces\TestimonialInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\FlagIconRepository;
use App\Repositories\HomePageRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\PartnersRepository;
use App\Repositories\PropertyRepository;
use App\Interfaces\FrontendPageInterface;
use App\Interfaces\Hrm\EmployeeInterface;
use App\Repositories\CommitteeRepository;
use App\Repositories\HowItWorkRepository;
use App\Interfaces\AdvertisementInterface;
use App\Interfaces\BusinessModelInterface;
use App\Interfaces\Hrm\LeaveTypeInterface;
use App\Repositories\PermissionRepository;
use App\Interfaces\BlogCategoriesInterface;
use App\Interfaces\GeneralSettingInterface;
use App\Interfaces\Hrm\DepartmentInterface;
use App\Repositories\HeroSectionRepository;
use App\Repositories\Hrm\HolidayRepository;
use App\Repositories\TestimonialRepository;
use App\Interfaces\AccountCategoryInterface;
use App\Interfaces\CommitteeMemberInterface;
use App\Interfaces\Hrm\DesignationInterface;
use App\Repositories\FrontendPageRepository;
use App\Repositories\Hrm\EmployeeRepository;
use App\Interfaces\PropertyCategoryInterface;
use App\Repositories\AdvertisementRepository;
use App\Repositories\BusinessModelRepository;
use App\Repositories\Hrm\LeaveTypeRepository;
use App\Repositories\AuthenticationRepository;
use App\Repositories\BlogCategoriesRepository;
use App\Repositories\GeneralSettingRepository;
use App\Repositories\Hrm\DepartmentRepository;
use App\Repositories\AccountCategoryRepository;
use App\Repositories\CommitteeMemberRepository;
use App\Repositories\Hrm\DesignationRepository;
use App\Repositories\PropertyCategoryRepository;
use App\Interfaces\PropertyFacilityTypeInterface;
use App\Repositories\PropertyFacilityTypeRepository;
use App\Interfaces\AuthenticationRepositoryInterface;
use App\Interfaces\CityInterface;
use App\Interfaces\StateInterface;
use App\Repositories\CityRepository;
use App\Repositories\StateRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthenticationRepositoryInterface::class, AuthenticationRepository::class);
        $this->app->bind(RoleInterface::class,                     RoleRepository::class);
        $this->app->bind(PermissionInterface::class,               PermissionRepository::class);
        $this->app->bind(UserInterface::class,                     UserRepository::class);
        $this->app->bind(BlogsInterface::class,                    BlogsRepository::class);
        $this->app->bind(BlogCategoriesInterface::class,           BlogCategoriesRepository::class);
        $this->app->bind(GeneralSettingInterface::class,           GeneralSettingRepository::class);
        $this->app->bind(SettingInterface::class,                  SettingRepository::class);
        $this->app->bind(LanguageInterface::class,                 LanguageRepository::class);
        $this->app->bind(FlagIconInterface::class,                 FlagIconRepository::class);
        $this->app->bind(TestimonialInterface::class,              TestimonialRepository::class);
        $this->app->bind(LeadershipInterface::class,               LeadershipRepository::class);
        $this->app->bind(HowItWorkInterface::class,                HowItWorkRepository::class);
        $this->app->bind(CategoryInterface::class,                 CategoryRepository::class);
        
        $this->app->bind(CountryInterface::class,                  CountryRepository::class);
        $this->app->bind(StateInterface::class,                    StateRepository::class);
        $this->app->bind(CityInterface::class,                     CityRepository::class);

        $this->app->bind(HomePageInterface::class,                 HomePageRepository::class);
        $this->app->bind(AboutInterface::class,                    AboutRepository::class);
        $this->app->bind(PartnersInterface::class,                 PartnersRepository::class);
        $this->app->bind(BusinessModelInterface::class,            BusinessModelRepository::class);
        $this->app->bind(FeatureInterface::class,                  FeatureRepository::class);
        $this->app->bind(HeroSectionInterface::class,              HeroSectionRepository::class);
        $this->app->bind(TenantInterface::class,                   TenantRepository::class);
        $this->app->bind(PropertyInterface::class,                 PropertyRepository::class);
        $this->app->bind(RentalInterface::class,                   RentalRepository::class);
        $this->app->bind(PropertyCategoryInterface::class,         PropertyCategoryRepository::class);
        $this->app->bind(PropertyFacilityTypeInterface::class,     PropertyFacilityTypeRepository::class);
        $this->app->bind(AdvertisementInterface::class,            AdvertisementRepository::class);
        $this->app->bind(CommitteeInterface::class,                CommitteeRepository::class);
        $this->app->bind(CommitteeMemberInterface::class,          CommitteeMemberRepository::class);
        $this->app->bind(OrderInterface::class,                    OrderRepository::class);
        $this->app->bind(AccountInterface::class,                  AccountRepository::class);
        $this->app->bind(AccountCategoryInterface::class,          AccountCategoryRepository::class);
        $this->app->bind(IncomeInterface::class,                   IncomeRepository::class);
        $this->app->bind(ExpenseInterface::class,                  ExpenseRepository::class);
        $this->app->bind(FqaInterface::class,                      FaqRepository::class);


        // Hrm
        $this->app->bind(DepartmentInterface::class,               DepartmentRepository::class);
        $this->app->bind(DesignationInterface::class,              DesignationRepository::class);
        $this->app->bind(EmployeeInterface::class,                 EmployeeRepository::class);
        $this->app->bind(LeaveTypeInterface::class,                LeaveTypeRepository::class);
        $this->app->bind(HolidayInterface::class,                  HolidayRepository::class);
        $this->app->bind(FrontendPageInterface::class,             FrontendPageRepository::class);
        $this->app->bind(RequirementInterface::class,              RequirementRepository::class);
        $this->app->bind(OfferInterface::class,                    OfferRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}