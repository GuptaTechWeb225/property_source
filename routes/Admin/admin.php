<?php

use App\Models\DuePayment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Backend\BillController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BlogsController;
use App\Http\Controllers\Backend\IncomeController;
use App\Http\Controllers\Backend\RentalController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\TenantController;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HomePageController;

use App\Http\Controllers\Backend\LandlordController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\PartnersController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\CaseStudyController;
use App\Http\Controllers\Backend\CommitteeController;
use App\Http\Controllers\Backend\HowItWorkController;
use App\Http\Controllers\Backend\MyProfileController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\AppointmentController;
use App\Http\Controllers\Backend\HeroSectionController;
use App\Http\Controllers\Backend\SMSAlertLogController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\BlogsCategoryController;
use App\Http\Controllers\Backend\BusinessModelController;
use App\Http\Controllers\Backend\FrontendPagesController;
use App\Http\Controllers\Backend\AccountCategoryController;
use App\Http\Controllers\Backend\CommitteeMemberController;
use App\Http\Controllers\Backend\PropertyCategoryController;
use App\Http\Controllers\Backend\PropertyFacilityTypeController;
use App\Http\Controllers\Backend\LeadershipController;
use App\Http\Controllers\Backend\SMSController;
use App\Http\Controllers\Backend\TimeSlotController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;

Route::controller(LanguageController::class)->prefix('languages')->group(function () {
    Route::get('/change', 'changeLanguage');
});

// auth routes
Route::group(['middleware' => ['auth.routes']], function () {
    // dashboard routes
    Route::get('dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
    Route::post('searchMenuData', [App\Http\Controllers\Backend\DashboardController::class, 'searchMenuData'])->name('searchMenuData');

    Route::get('global-search', [App\Http\Controllers\Backend\DashboardController::class, 'globalSearch'])->name('global_search');

    Route::any('message-sender', [SettingController::class, 'messageSender'])->name('message-sender');
    Route::get('fetch-states', [AjaxController::class, 'fetchStates'])->name('fetch-states');
    Route::get('fetch-cities', [AjaxController::class, 'fetchCities'])->name('fetch-cities');
    Route::get('fetch-categories-doc', [AjaxController::class, 'fetchCategoriesDoc'])->name('fetchCategoriesDoc');



    Route::controller(RoleController::class)->prefix('roles')->group(function () {
        Route::get('/', 'index')->name('roles.index')->middleware('PermissionCheck:role_read');
        Route::get('/create', 'create')->name('roles.create')->middleware('PermissionCheck:role_create');
        Route::post('/store', 'store')->name('roles.store')->middleware('PermissionCheck:role_create');
        Route::get('/edit/{id}', 'edit')->name('roles.edit')->middleware('PermissionCheck:role_update');
        Route::put('/update/{id}', 'update')->name('roles.update')->middleware('PermissionCheck:role_update');
        Route::delete('/delete/{id}', 'delete')->name('roles.delete')->middleware('PermissionCheck:role_delete');
    });

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('/', 'index')->name('users.index');
        Route::get('/create', 'create')->name('users.create')->middleware('PermissionCheck:user_create');
        Route::post('/store', 'store')->name('users.store')->middleware('PermissionCheck:user_create');
        Route::get('/edit/{id}', 'edit')->name('users.edit')->middleware('PermissionCheck:user_update');
        Route::put('/update/{id}', 'update')->name('users.update')->middleware('PermissionCheck:user_update');
        Route::delete('/delete/{id}', 'delete')->name('users.delete')->middleware('PermissionCheck:user_delete');

        Route::get('/change-role', 'changeRole')->name('change.role');
        Route::post('/status', 'status')->name('users.status');
        Route::delete('/{id}', 'deletes')->name('users.deletes');

        // users.profile
        Route::get('/profile/{id}', 'profile')->name('users.profile')->middleware('PermissionCheck:user_read');
        Route::get('/profile/{id}/{type}', 'profileDetails')->name('users.profileDetails')->middleware('PermissionCheck:user_read');
        Route::post('/profile/{id}/{type}/store', 'profileDetailsStore')->name('users.profileDetailsStore')->middleware('PermissionCheck:user_read');
        Route::get('/attachment-delete/{id}', 'deleteAttachment')->name('users.deleteAttachment');
        Route::get('/create-pdf/{id}', 'createPDF')->name('users.createPDF');
        Route::get('/delete-account-category/{id}', 'deleteAccountCategory')->name('users.accountCategory.delete');
        Route::get('/delete-account/{id}', 'deleteAccount')->name('users.account.delete');


        // Route::delete('/profile/{id}/{type}/attachment-delete/{id}', 'destroyAttachment')->name('users.destroyAttachment');
        // Route::post('/profile/{id}/{type}/store',                 'rentalDetailsStore')->name('users.rentalDetailsStore')->middleware('PermissionCheck:user_read');

    });

    Route::controller(OrderController::class)->prefix('orders')->group(function () {
        Route::get('/', 'index')->name('orders.index')->middleware('PermissionCheck:order_read');
        Route::get('/create', 'create')->name('orders.create')->middleware('PermissionCheck:order_create');
        Route::get('/add-to-cart/{id}', 'addToCart')->name('orders.addToCart')->middleware('PermissionCheck:order_create');
        Route::get('/remove-from-cart/{id}', 'removeFromCart')->name('orders.removeFromCart')->middleware('PermissionCheck:order_create');
        Route::get('/checkout', 'checkout')->name('orders.checkout')->middleware('PermissionCheck:order_create');
        Route::post('/store', 'store')->name('orders.store')->middleware('PermissionCheck:order_create');
        Route::get('/edit/{order_number}', 'edit')->name('orders.edit')->middleware();
        Route::get('/details/{order_number}', 'show')->name('orders.detail')->middleware();
        Route::post('/update', 'update')->name('orders.update')->middleware('PermissionCheck:order_update');
        Route::post('/update-detail', 'update_detail')->name('orders.update.detail')->middleware();
        Route::delete('/delete/{id}', 'delete')->name('orders.delete')->middleware('PermissionCheck:order_delete');
        Route::post('/fetch-property', 'fetch_property')->name('orders.fetchProperty')->middleware();
        Route::post('/calculate-payment', 'calculate_payment')->name('orders.calculate_payment')->middleware();
        Route::post('/payment', 'payment')->name('orders.payment')->middleware('PermissionCheck:order_payment');
        Route::get('/invoice/{id}', 'invoice')->name('orders.invoice');

        Route::get('family-member-eligible/{id}', 'familyMemberEligible')->name('orders.familyMemberEligible');
    });


    Route::controller(PropertyController::class)->prefix('properties')->group(function () {
        Route::get('/all', 'index')->name('properties.index')->middleware('PermissionCheck:property_read');
        Route::get('/create', 'create')->name('properties.create')->middleware('PermissionCheck:property_create');
        Route::post('/store', 'store')->name('properties.store');
        Route::get('/image-delete/{id}', 'deleteImage')->name('properties.deleteImage')->middleware('PermissionCheck:property_update');
        Route::get('/facility-delete/{id}', 'facilityDelete')->name('properties.facilityDelete')->middleware('PermissionCheck:property_update');
        Route::get('/edit/{id}', 'edit')->name('properties.edit')->middleware('PermissionCheck:property_update');
        Route::post('/update/{id}/{type}', 'update')->name('properties.update')->middleware('PermissionCheck:property_update');
        Route::delete('/delete/{id}', 'delete')->name('properties.delete')->middleware('PermissionCheck:property_delete');
        Route::get('/{id}/details/{type}', 'detailsType')->name('admin.properties.details')->middleware('PermissionCheck:property_update');
        Route::get('/{id}/update-status/{status}', 'updateStatus')->name('admin.properties.update_status')->middleware('PermissionCheck:property_update');
        // Route to fetch states based on the selected country
        Route::get('/get-states/{id}', 'getStates')->name('get-states');

        // Route to fetch cities based on the selected state
        Route::get('/get-cities/{id}', 'getCities')->name('get-cities');

        Route::post('change-property-doc-status', 'changeDocStatus')->name('changeDocStatus');

        Route::get('verify-property/{id}', 'verifyProperty')->name('verifyProperty');
        Route::post('uploadVideo/{id}', 'uploadVideo')->name('uploadVideo');
        Route::get('verifyVideo/{id}/{status}', 'verifyVideo')->name('verifyVideo');
    });
    Route::controller(PropertyCategoryController::class)->prefix('property/categories')->group(function () {
        Route::get('/', 'index')->name('properties.categories.index')->middleware('PermissionCheck:property_category_read');
        Route::get('/create', 'create')->name('properties.categories.create')->middleware('PermissionCheck:property_category_create');
        Route::post('/store', 'store')->name('properties.categories.store')->middleware('PermissionCheck:property_category_create');
        Route::get('/edit/{id}', 'edit')->name('properties.categories.edit')->middleware('PermissionCheck:property_category_update');
        Route::put('/update/{id}', 'update')->name('properties.categories.update')->middleware('PermissionCheck:property_category_update');
        Route::delete('/delete/{id}', 'delete')->name('properties.categories.delete')->middleware('PermissionCheck:property_category_delete');
    });
    Route::controller(PropertyFacilityTypeController::class)->prefix('property/facility-types')->group(function () {
        Route::get('/', 'index')->name('properties.facilityType.index')->middleware('PermissionCheck:property_facility_type_read');
        Route::get('/create', 'create')->name('properties.facilityType.create')->middleware('PermissionCheck:property_facility_type_create');
        Route::post('/store', 'store')->name('properties.facilityType.store')->middleware('PermissionCheck:property_facility_type_create');
        Route::get('/edit/{id}', 'edit')->name('properties.facilityType.edit')->middleware('PermissionCheck:property_facility_type_update');
        Route::put('/update/{id}', 'update')->name('properties.facilityType.update')->middleware('PermissionCheck:property_facility_type_update');
        Route::delete('/delete/{id}', 'delete')->name('properties.facilityType.delete')->middleware('PermissionCheck:property_facility_type_delete');
    });

    Route::controller(AdvertisementController::class)->prefix('advertisements')->group(function () {
        Route::get('/', 'index')->name('advertisements.index')->middleware('PermissionCheck:property_read');
        Route::get('/create', 'create')->name('advertisements.create')->middleware('PermissionCheck:property_create');
        Route::post('/store', 'store')->name('advertisements.store');
        Route::get('/approve-status/{id}/{type}', 'approvalStatus')->name('advertisements.approveStatus');
        Route::delete('/delete/{id}', 'delete')->name('advertisements.delete');
    });

    Route::controller(AdvertisementController::class)->prefix('advertisements')->group(function () {
        Route::get('/', 'index')->name('advertisements.index')->middleware('PermissionCheck:property_read');
        Route::get('/create', 'create')->name('advertisements.create')->middleware('PermissionCheck:property_create');
        Route::post('/store', 'store')->name('advertisements.store');
    });

    Route::controller(MyProfileController::class)->prefix('my')->group(function () {
        Route::get('/profile', 'profile')->name('my.profile')->middleware('PermissionCheck:profile_read');
        Route::get('/profile/edit', 'edit')->name('my.profile.edit')->middleware('PermissionCheck:profile_update');
        Route::put('/profile/update', 'update')->name('my.profile.update')->middleware('PermissionCheck:profile_update');

        Route::get('/password/update', 'passwordUpdate')->name('passwordUpdate')->middleware('PermissionCheck:profile_update');
        Route::put('/password/update/store', 'passwordUpdateStore')->name('passwordUpdateStore')->middleware('PermissionCheck:profile_update');
    });

    Route::controller(CountryController::class)->prefix('countries')->group(function () {
        Route::get('/', 'index')->name('countries.index');
        Route::get('/create', 'create')->name('countries.create');
        Route::post('/store', 'store')->name('countries.store');
        Route::get('/edit/{id}', 'edit')->name('countries.edit');
        Route::put('/update/{id}', 'update')->name('countries.update');
        Route::delete('/delete/{id}', 'delete')->name('countries.delete');
    });
    Route::controller(StateController::class)->prefix('states')->group(function () {
        Route::get('/', 'index')->name('states.index');
        Route::get('/create', 'create')->name('states.create');
        Route::post('/store', 'store')->name('states.store');
        Route::get('/edit/{id}', 'edit')->name('states.edit');
        Route::put('/update/{id}', 'update')->name('states.update');
        Route::delete('/delete/{id}', 'delete')->name('states.delete');
    });
    Route::controller(CityController::class)->prefix('cities')->group(function () {
        Route::get('/', 'index')->name('cities.index');
        Route::get('/create', 'create')->name('cities.create');
        Route::post('/store', 'store')->name('cities.store');
        Route::get('/edit/{id}', 'edit')->name('cities.edit');
        Route::put('/update/{id}', 'update')->name('cities.update');
        Route::delete('/delete/{id}', 'delete')->name('cities.delete');
    });
    // Blog Routes Start
    Route::prefix('blog')->group(function () {
        Route::get('/', [BlogsController::class, 'index'])->name('blogs.index')->middleware('PermissionCheck:blogs_read');
        Route::get('/create', [BlogsController::class, 'create'])->name('blogs.create')->middleware('PermissionCheck:blogs_create');
        Route::post('/store', [BlogsController::class, 'store'])->name('blogs.store')->middleware('PermissionCheck:blogs_create');
        Route::get('/edit/{id}', [BlogsController::class, 'edit'])->name('blogs.edit')->middleware('PermissionCheck:blogs_update');
        Route::put('/update/{id}', [BlogsController::class, 'update'])->name('blogs.update')->middleware('PermissionCheck:blogs_update');
        Route::delete('/delete/{id}', [BlogsController::class, 'delete'])->name('blogs.delete')->middleware('PermissionCheck:blogs_delete');

        // Blog Categories Routes
        Route::prefix('categories')->group(function () {
            Route::get('/', [BlogsCategoryController::class, 'index'])->name('blogs.category.index')->middleware('PermissionCheck:blog_categories_read');
            Route::get('/create', [BlogsCategoryController::class, 'create'])->name('blogs.category.create')->middleware('PermissionCheck:blog_categories_create');
            Route::post('/store', [BlogsCategoryController::class, 'store'])->name('blogs.category.store')->middleware('PermissionCheck:blog_categories_create');
            Route::get('/edit/{id}', [BlogsCategoryController::class, 'edit'])->name('blogs.category.edit')->middleware('PermissionCheck:blog_categories_update');
            Route::put('/update/{id}', [BlogsCategoryController::class, 'update'])->name('blogs.category.update')->middleware('PermissionCheck:blog_categories_update');
            Route::delete('/delete/{id}', [BlogsCategoryController::class, 'delete'])->name('blogs.category.delete')->middleware('PermissionCheck:blog_categories_delete');
        });
    });


    // Case Study Routes Start


    Route::prefix('case_studies')->group(function () {
        Route::get('/', [CaseStudyController::class, 'index'])->name('case_studies.index')->middleware('PermissionCheck:case_studies_read');
        Route::get('/create', [CaseStudyController::class, 'create'])->name('case_studies.create')->middleware('PermissionCheck:case_studies_create');
        Route::post('/store', [CaseStudyController::class, 'store'])->name('case_studies.store')->middleware('PermissionCheck:case_studies_create');
        Route::get('/edit/{id}', [CaseStudyController::class, 'edit'])->name('case_studies.edit')->middleware('PermissionCheck:case_studies_update');
        Route::put('/update/{id}', [CaseStudyController::class, 'update'])->name('case_studies.update')->middleware('PermissionCheck:case_studies_update');
        Route::delete('/delete/{id}', [CaseStudyController::class, 'delete'])->name('case_studies.delete')->middleware('PermissionCheck:case_studies_delete');
    });

    // Home Start
    Route::prefix('homepage')->group(function () {
        Route::get('/section-titles', [HomePageController::class, 'index'])->name('home.section-titles.index')->middleware('PermissionCheck:section_titles_update');
        Route::put('/section-titles/post', [HomePageController::class, 'update'])->name('home.section-titles.update')->middleware('PermissionCheck:section_titles_update');

        Route::prefix('faqs')->name('faq.')->controller(FaqController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'destroy')->name('delete');
        });
        // Partners
        Route::prefix('partners')->group(function () {
            Route::get('/', [PartnersController::class, 'index'])->name('home.partners.index')->middleware('PermissionCheck:partners_read');
            Route::get('/create', [PartnersController::class, 'create'])->name('home.partners.create')->middleware('PermissionCheck:partners_create');
            Route::post('/store', [PartnersController::class, 'store'])->name('home.partners.store')->middleware('PermissionCheck:partners_create');
            Route::get('/edit/{id}', [PartnersController::class, 'edit'])->name('home.partners.edit')->middleware('PermissionCheck:partners_update');
            Route::put('/update/{id}', [PartnersController::class, 'update'])->name('home.partners.update')->middleware('PermissionCheck:partners_update');
            Route::delete('/delete/{id}', [PartnersController::class, 'delete'])->name('home.partners.delete')->middleware('PermissionCheck:partners_delete');
        });
    });
    // Home End

    // About Us Start
    Route::prefix('about-us')->group(function () {
        Route::get('/content', [AboutController::class, 'index'])->name('about.section-titles.index')->middleware('PermissionCheck:about_update');
        Route::put('/content/post', [AboutController::class, 'update'])->name('about.section-titles.update')->middleware('PermissionCheck:about_update');
    });
    // About Us End

    Route::controller(LanguageController::class)->prefix('languages')->group(function () {
        Route::get('/', 'index')->name('languages.index')->middleware('PermissionCheck:language_read');
        Route::get('/create', 'create')->name('languages.create')->middleware('PermissionCheck:language_create');
        Route::post('/store', 'store')->name('languages.store')->middleware('PermissionCheck:language_create');
        Route::get('/edit/{id}', 'edit')->name('languages.edit')->middleware('PermissionCheck:language_update');
        Route::put('/update/{id}', 'update')->name('languages.update')->middleware('PermissionCheck:language_update');
        Route::delete('/delete/{id}', 'delete')->name('languages.delete')->middleware('PermissionCheck:language_delete');

        Route::get('/terms/{id}', 'terms')->name('languages.edit.terms')->middleware('PermissionCheck:language_update_terms');
        Route::put('/update/terms/{code}', 'termsUpdate')->name('languages.update.terms')->middleware('PermissionCheck:language_update_terms');
        Route::get('/change-module', 'changeModule')->name('languages.change.module');

        // Route::get('/change', 'changeLanguage')->name('languages.change');
    });

    Route::controller(TestimonialController::class)->prefix('testimonials')->group(function () {
        Route::get('/', 'index')->name('testimonials.index')->middleware('PermissionCheck:testimonial_read');
        Route::get('/create', 'create')->name('testimonials.create')->middleware('PermissionCheck:testimonial_create');
        Route::post('/store', 'store')->name('testimonials.store')->middleware('PermissionCheck:testimonial_create');
        Route::get('/edit/{id}', 'edit')->name('testimonials.edit')->middleware('PermissionCheck:testimonial_update');
        Route::put('/update/{id}', 'update')->name('testimonials.update')->middleware('PermissionCheck:testimonial_update');
        Route::delete('/delete/{id}', 'delete')->name('testimonials.delete')->middleware('PermissionCheck:testimonial_delete');
    });

    Route::controller(LeadershipController::class)->prefix('leaderships')->name('leaderships.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware();
        Route::get('/create', 'create')->name('create')->middleware();
        Route::post('/store', 'store')->name('store')->middleware();
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware();
        Route::put('/update/{id}', 'update')->name('update')->middleware();
        Route::delete('/delete/{id}', 'delete')->name('delete')->middleware();
    });

    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('/', 'index')->name('categories.index')->middleware('PermissionCheck:category_read');
        Route::get('/create', 'create')->name('categories.create')->middleware('PermissionCheck:category_create');
        Route::post('/store', 'store')->name('categories.store')->middleware('PermissionCheck:category_create');
        Route::get('/edit/{id}', 'edit')->name('categories.edit')->middleware('PermissionCheck:category_update');
        Route::put('/update/{id}', 'update')->name('categories.update')->middleware('PermissionCheck:category_update');
        Route::delete('/delete/{id}', 'delete')->name('categories.delete')->middleware('PermissionCheck:category_delete');
    });

    Route::controller(HowItWorkController::class)->prefix('how-it-works')->group(function () {
        Route::get('/', 'index')->name('how-it-works.index')->middleware('PermissionCheck:testimonial_read');
        Route::get('/create', 'create')->name('how-it-works.create')->middleware('PermissionCheck:testimonial_create');
        Route::post('/store', 'store')->name('how-it-works.store')->middleware('PermissionCheck:testimonial_create');
        Route::get('/edit/{id}', 'edit')->name('how-it-works.edit')->middleware('PermissionCheck:testimonial_update');
        Route::put('/update/{id}', 'update')->name('how-it-works.update')->middleware('PermissionCheck:testimonial_update');
        Route::delete('/delete/{id}', 'delete')->name('how-it-works.delete')->middleware('PermissionCheck:testimonial_delete');
    });

    Route::controller(BusinessModelController::class)->prefix('business-models')->group(function () {
        Route::get('/', 'index')->name('business-models.index')->middleware('PermissionCheck:business_model_read');
        Route::get('/create', 'create')->name('business-models.create')->middleware('PermissionCheck:business_model_create');
        Route::post('/store', 'store')->name('business-models.store')->middleware('PermissionCheck:business_model_create');
        Route::get('/edit/{id}', 'edit')->name('business-models.edit')->middleware('PermissionCheck:business_model_update');
        Route::put('/update/{id}', 'update')->name('business-models.update')->middleware('PermissionCheck:business_model_update');
        Route::delete('/delete/{id}', 'delete')->name('business-models.delete')->middleware('PermissionCheck:business_model_delete');
    });

    Route::controller(FeatureController::class)->prefix('features')->group(function () {
        Route::get('/', 'index')->name('features.index')->middleware('PermissionCheck:feature_read');
        Route::get('/create', 'create')->name('features.create')->middleware('PermissionCheck:feature_create');
        Route::post('/store', 'store')->name('features.store')->middleware('PermissionCheck:feature_create');
        Route::get('/edit/{id}', 'edit')->name('features.edit')->middleware('PermissionCheck:feature_update');
        Route::put('/update/{id}', 'update')->name('features.update')->middleware('PermissionCheck:feature_update');
        Route::delete('/delete/{id}', 'delete')->name('features.delete')->middleware('PermissionCheck:feature_delete');
    });

    Route::controller(HeroSectionController::class)->prefix('hero-sections')->group(function () {
        Route::get('/', 'index')->name('hero-sections.index')->middleware('PermissionCheck:hero_section_read');
        Route::get('/create', 'create')->name('hero-sections.create')->middleware('PermissionCheck:hero_section_create');
        Route::post('/store', 'store')->name('hero-sections.store')->middleware('PermissionCheck:hero_section_create');
        Route::get('/edit/{id}', 'edit')->name('hero-sections.edit')->middleware('PermissionCheck:hero_section_update');
        Route::put('/update/{id}', 'update')->name('hero-sections.update')->middleware('PermissionCheck:hero_section_update');
        Route::delete('/delete/{id}', 'delete')->name('hero-sections.delete')->middleware('PermissionCheck:hero_section_delete');
    });

    Route::controller(TenantController::class)->prefix('tenants')->group(function () {
        Route::get('/', 'index')->name('tenants.index')->middleware('PermissionCheck:tenant_read');
        Route::get('/create', 'create')->name('tenants.create')->middleware('PermissionCheck:tenant_create');
        Route::get('/checkout/{id}', 'checkout')->name('tenants.checkout')->middleware('PermissionCheck:tenant_create');
        Route::post('/store', 'store')->name('tenants.store')->middleware('PermissionCheck:tenant_create');
        Route::get('/edit/{id}', 'edit')->name('tenants.edit')->middleware('PermissionCheck:tenant_update');
        Route::get('/show/{id}', 'show')->name('tenants.show')->middleware('PermissionCheck:tenant_show');
        Route::put('/update/{id}', 'update')->name('tenants.update')->middleware('PermissionCheck:tenant_update');
        Route::delete('/delete/{id}', 'delete')->name('tenants.delete')->middleware('PermissionCheck:tenant_delete');
        Route::post('/verify/{id}', 'verify')->name('tenants.verify');
        Route::get('/verify-address/{id}/{status}', 'verifyAddress')->name('tenants.verifyAddress');
    });



    Route::controller(RentalController::class)->prefix('rental')->group(function () {
        Route::get('/', 'index')->name('rental.index')->middleware('PermissionCheck:rental_read');
    });

    Route::controller(AppointmentController::class)->prefix('backend/appointment')->as('backend.appointment.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('PermissionCheck:appointment_read');
        Route::get('/create', 'create')->name('create')->middleware('PermissionCheck:appointment_read');
        Route::post('/store', 'store')->name('store')->middleware('PermissionCheck:appointment_read');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('PermissionCheck:appointment_read');
        Route::put('/update/{id}', 'update')->name('update')->middleware('PermissionCheck:appointment_read');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy')->middleware('PermissionCheck:appointment_read');
    });

    Route::controller(TimeSlotController::class)->prefix('backend/timeslot')->as('backend.timeslot.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('PermissionCheck:timeslot_read');
        Route::get('/create', 'create')->name('create')->middleware('PermissionCheck:timeslot_create');
        Route::post('/store', 'store')->name('store')->middleware('PermissionCheck:timeslot_create');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('PermissionCheck:timeslot_update');
        Route::put('/update/{id}', 'update')->name('update')->middleware('PermissionCheck:timeslot_update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy')->middleware('PermissionCheck:timeslot_delete');
    });

    Route::controller(AccountController::class)->prefix('account')->group(function () {
        Route::get('/', 'index')->name('account.index')->middleware('PermissionCheck:account_read');
        Route::get('/create', 'create')->name('account.create')->middleware('PermissionCheck:account_create');
        Route::post('/store', 'store')->name('account.store')->middleware('PermissionCheck:account_create');
        Route::get('/edit/{id}', 'edit')->name('account.edit')->middleware('PermissionCheck:account_create');
        Route::put('/update/{id}', 'update')->name('account.update')->middleware('PermissionCheck:account_create');
        Route::delete('/destroy/{id}', 'destroy')->name('account.destroy')->middleware('PermissionCheck:account_delete');
        Route::get('/payment', 'paymentHistory')->name('account.payment')->middleware();
        Route::get('/payment-details/{id}', 'paymentDetails')->name('account.payment_details')->middleware();
    });

    Route::controller(BillController::class)->prefix('bill')->as('bill.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('PermissionCheck:bill_read');
        Route::get('/create', 'create')->name('create')->middleware('PermissionCheck:bill_create');
        Route::post('/store', 'store')->name('store')->middleware('PermissionCheck:bill_create');
        Route::get('/show/{id}', 'show')->name('show')->middleware('PermissionCheck:bill_show');
        Route::get('/collect-bill/{id}', 'collectBill')->name('collect_bill')->middleware('PermissionCheck:bill_create');
        Route::get('/bill-amount', 'getBillAmount')->name('bill_amount');
        Route::post('/calculate-fine', 'calculateFine')->name('calculate_fine')->middleware('PermissionCheck:bill_create');
        Route::post('/payment/process', 'paymentpProcess')->name('payment')->middleware('PermissionCheck:bill_create');
    });

    Route::controller(AccountCategoryController::class)->prefix('account-category')->as('account_category.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('PermissionCheck:account_category_read');
        Route::get('/create', 'create')->name('create')->middleware('PermissionCheck:account_category_create');
        Route::post('/store', 'store')->name('store')->middleware('PermissionCheck:account_category_create');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('PermissionCheck:account_category_update');
        Route::put('/update/{id}', 'update')->name('update')->middleware('PermissionCheck:account_category_update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy')->middleware('PermissionCheck:account_category_delete');
    });

    Route::controller(IncomeController::class)->prefix('income')->as('income.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('PermissionCheck:income_read');
        Route::get('/create', 'create')->name('create')->middleware('PermissionCheck:income_create');
        Route::post('/store', 'store')->name('store')->middleware('PermissionCheck:income_create');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('PermissionCheck:income_update');
        Route::put('/update/{id}', 'update')->name('update')->middleware('PermissionCheck:income_update');
        Route::get('/show/{id}', 'show')->name('show')->middleware('PermissionCheck:income_show');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy')->middleware('PermissionCheck:income_delete');
    });

    Route::controller(ExpenseController::class)->prefix('expense')->as('expense.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('PermissionCheck:expense_read');
        Route::get('/create', 'create')->name('create')->middleware('PermissionCheck:expense_create');
        Route::post('/store', 'store')->name('store')->middleware('PermissionCheck:expense_create');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('PermissionCheck:expense_update');
        Route::put('/update/{id}', 'update')->name('update')->middleware('PermissionCheck:expense_update');
        Route::get('/show/{id}', 'show')->name('show')->middleware('PermissionCheck:expense_show');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy')->middleware('PermissionCheck:expense_delete');
    });

    Route::controller(SettingController::class)->prefix('/')->group(function () {
        Route::get('/general-settings', 'generalSettings')->name('settings.general-settings')->middleware('PermissionCheck:general_settings_read');
        Route::post('/general-settings', 'updateGeneralSetting')->name('settings.general-settings')->middleware('PermissionCheck:general_settings_update');

        Route::get('/storage-setting', 'storagesetting')->name('settings.storagesetting')->middleware('PermissionCheck:storage_settings_read');
        Route::put('/storage-setting-update', 'storageSettingUpdate')->name('settings.storageSettingUpdate')->middleware("PermissionCheck:storage_settings_update");

        Route::get('/database-backups', 'databaseBackups')->name('settings.database-backups')->middleware('PermissionCheck:db_backup_read');
        Route::get('/database-backups/process', 'databaseBackupProcess')->name('settings.database-backup-process')->middleware('PermissionCheck:db_backup_create');
        Route::delete('/database-backups/delete/{id}', 'databaseBackupDelete')->name('settings.database-backup-delete')->middleware('PermissionCheck:db_backup_delete');

        Route::get('/recaptcha-setting', 'recaptchaSetting')->name('settings.recaptcha-setting')->middleware('PermissionCheck:recaptcha_settings_read');
        Route::post('/recaptcha-setting', 'updateRecaptchaSetting')->name('settings.recaptcha-setting')->middleware('PermissionCheck:recaptcha_settings_update');

        Route::get('/email-setting', 'mailSetting')->name('settings.mail-setting')->middleware('PermissionCheck:email_settings_read');
        Route::post('/email-setting', 'updateMailSetting')->name('settings.mail-setting')->middleware('PermissionCheck:email_settings_update');

        Route::get('/payment-setting', 'paymentSetting')->name('settings.payment-setting');
        Route::post('/paypal-payment-setting', 'updatePaypalPaymentSetting')->name('settings.paypal-payment-setting');

        Route::get('/sms-setting', 'smsSetting')->name('settings.sms-setting');
        Route::post('/sms-setting', 'updateSmsSetting')->name('settings.sms-setting');

        // Bill Setting
        Route::match(['get', 'post'], '/bill-setup', 'billSetup')->name('settings.billsetup');

        Route::post('/bill-cron-setup', 'billCronSetup')->name('settings.billCronSetup');


        //Theme Change
        Route::post('/change-theme', 'changeTheme')->name('changeTheme');
        Route::get('/update-permission', 'updatePermission')->name('update_permission');
    });

    Route::controller(ContactController::class)->prefix('contacts')->group(function () {
        Route::get('/', 'index')->name('contact.index')->middleware('PermissionCheck:contact_read');
        Route::get('/view-message/{id}', 'view')->name('contact.view')->middleware('PermissionCheck:contact_read');
        Route::delete('/delete/{id}', 'delete')->name('contact.delete')->middleware('PermissionCheck:contact_delete');
    });


    Route::controller(FrontendPagesController::class)->prefix('frontend_pages')->group(function () {
        Route::get('/index', 'index')->name('frontend_pages.index')->middleware('PermissionCheck:frontend_pages_list');
        Route::get('/create', 'create')->name('frontend_pages.create')->middleware('PermissionCheck:frontend_pages_create');
        Route::post('/store', 'store')->name('frontend_pages.store')->middleware('PermissionCheck:frontend_pages_create');
        Route::get('/edit/{id}', 'edit')->name('frontend_pages.edit')->middleware('PermissionCheck:frontend_pages_edit');
        Route::post('/update', 'update')->name('frontend_pages.update')->middleware('PermissionCheck:frontend_pages_edit');
        Route::delete('/delete/{id}', 'delete')->name('frontend_pages.delete')->middleware('PermissionCheck:frontend_pages_delete');
    });


    Route::controller(CommitteeController::class)->prefix('committees')->group(function () {
        Route::get('/', 'index')->name('committees.index')->middleware('PermissionCheck:committee_read');
        Route::get('/create', 'create')->name('committees.create')->middleware('PermissionCheck:committee_create');
        Route::post('/store', 'store')->name('committees.store')->middleware('PermissionCheck:committee_create');
        Route::get('/edit/{id}', 'edit')->name('committees.edit')->middleware('PermissionCheck:committee_update');
        Route::put('/update/{id}', 'update')->name('committees.update')->middleware('PermissionCheck:committee_update');
        Route::get('/show/{id}', 'show')->name('committees.show')->middleware('PermissionCheck:committee_show');
        Route::delete('/destroy/{id}', 'destroy')->name('committees.destroy')->middleware('PermissionCheck:committee_delete');
    });

    Route::controller(LandlordController::class)->prefix('landlord')->group(function () {
        Route::get('/', 'index')->name('landlord.index')->middleware('PermissionCheck:landlord_read');
        Route::get('/create', 'create')->name('landlord.create')->middleware('PermissionCheck:landlord_create');
        Route::post('/store', 'store')->name('landlord.store')->middleware('PermissionCheck:landlord_create');
        Route::get('/edit/{id}', 'edit')->name('landlord.edit')->middleware('PermissionCheck:landlord_create');
        Route::put('/update/{id}', 'update')->name('landlord.update')->middleware('PermissionCheck:landlord_create');
        Route::get('/show/{id}', 'show')->name('landlord.show')->middleware('PermissionCheck:landlord_show');
        Route::delete('/destroy/{id}', 'destroy')->name('landlord.destroy')->middleware('PermissionCheck:landlord_delete');
    });

    Route::controller(CommitteeMemberController::class)->prefix('committee-member')->group(function () {
        Route::post('/store', 'store')->name('committee-member.store')->middleware('PermissionCheck:committee_member_create');
        Route::delete('/destroy/{id}', 'destroy')->name('committee-member.destroy')->middleware('PermissionCheck:committee_member_delete');
    });

    Route::controller(SMSAlertLogController::class)->prefix('sms-alert-logs')->group(function () {
        Route::get('/', 'index')->name('sms-alert-logs.index');
        Route::get('/send', 'create')->name('sms-alert-logs.create');
        Route::post('/send', 'send')->name('sms-alert-logs.send');
    });

    Route::controller(SMSController::class)->prefix('sms/box')->group(function () {
        Route::get('/', 'index')->name('sms.index')->middleware('PermissionCheck:smsbox_read');
        Route::get('/send', 'create')->name('sms.create')->middleware('PermissionCheck:smsbox_create');
        Route::post('/send', 'send')->name('sms.send');
    });


    Route::controller(ReportController::class)->prefix('report')->as('report.')->group(function () {
        Route::get('payment', 'paymentReport')->name('payment')->middleware('PermissionCheck:payment_report');
        Route::get('tenant', 'tenantReport')->name('tenant')->middleware('PermissionCheck:tenant_report');
        Route::get('apartment', 'apartmentReport')->name('apartment');
        Route::get('room', 'roomReport')->name('room')->middleware('PermissionCheck:room_report');
    });

    Route::controller(NotificationController::class)->prefix('notification')->as('notification.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/change-status/{id}', 'changeStatus')->name('change_status');
        Route::post('/selected-item-action', 'selectedItemAction')->name('selected_item_ation');
        Route::get('/all-read', 'allread')->name('allread');
        Route::get('/all-delete', 'alldelete')->name('alldelete');
        Route::get('/detail/{id}', 'show')->name('show');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });



    Route::get('sms', function () {
        $sms_template = Setting('sms_body_content');
        $last_date = Setting('last_payment_day') ? Setting('last_payment_day') : 10;
        $fine = Setting('fine_percentage') ? Setting('fine_percentage') : 0;
        $due_payments = DuePayment::with(['property:id,name', 'tenant:id,name'])->where('payment_status', 'due')->get();
        foreach ($due_payments as $payment) {
            if ($payment->due_amount > 0) {
                $data = [
                    'name' => @$payment->tenant->name,
                    'property_name' => @$payment->property->name,
                    'due_amount' => priceFormat($payment->due_amount),
                    'expire_date' => Carbon::create(date('Y'), date('m'), ($last_date)),
                    'fine' => priceFormat(($payment->due_amount * $fine) / 100)
                ];

                $message_body = str_replace('[name]', @$data['name'], $sms_template);
                $message_body = str_replace('[property_name]', @$data['property_name'], $message_body);
                $message_body = str_replace('[due_amount]', @$data['due_amount'], $message_body);
                $message_body = str_replace('[expire_date]', @$data['expire_date'], $message_body);
                $message_body = str_replace('[fine]', @$data['fine'], $message_body);
            }
        }
    });
});
