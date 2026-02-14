<?php

use Illuminate\Support\Facades\Route;
use \Modules\Marsland\Http\Controllers\MarslandController;
use \Modules\Marsland\Http\Controllers\OrderController;
use \Modules\Marsland\Http\Controllers\PropertyController;
use \Modules\Marsland\Http\Controllers\CustomerController;
use \Modules\Marsland\Http\Controllers\AccountCategoryController;
use \Modules\Marsland\Http\Controllers\CartController;
use \Modules\Marsland\Http\Controllers\ContactController;
use \Modules\Marsland\Http\Controllers\AppointmentController;
use Modules\Marsland\Http\Controllers\AccountController;
use Modules\Marsland\Http\Controllers\FamilyMemberController;
use Modules\Marsland\Http\Controllers\ContentPageController;
Route::controller(MarslandController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about-us', 'aboutUs')->name('about_us');
    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy_policy');
    Route::get('/faqs', 'faqs')->name('faqs');
    Route::get('/terms-condition', 'termsCondition')->name('terms_condition');
    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/blog/{slug}', 'blogDetails')->name('blog.details');
    Route::get('/case_study/{slug}', 'caseStudytails')->name('case_study.details');
    Route::get('/verify-visitor', 'verifyVisitor')->name('verifyVisitor');
    Route::post('/verification-process', 'verifyVisitorProcess')->name('verifyVisitorProcess');
    Route::get('/tenant-public-profile/{id}', 'tenantPublicProfile')->name('tenantPublicProfile');
});

Route::get('page/{slug}', [ContentPageController::class, 'contentPage'])->name('view-page');


Route::controller(ContactController::class)->group(function () {
    Route::get('/contact-us', 'contactUs')->name('contact_us');
    Route::post('/contact-store', 'contactStore')->name('contact_store');
});

Route::controller(PropertyController::class)->group(function () {
    Route::post('/filters-properties', 'filterProperties')->name('property.filter');
    Route::get('/properties', 'properties')->name('properties');
    Route::get('/property-details/{slug}', 'propertyDetail')->name('property.detail');
    Route::post('/property-review', 'propertyReview')->name('property.review');

    Route::get('/trending-property', 'trendingProperty')->name('property.trending');
    Route::get('/buy-property', 'buyProperty')->name('property.buy');
    Route::get('/rent-property', 'rentProperty')->name('property.rent');
    Route::get('/discounted-property', 'discountedProperty')->name('property.discounted');
    Route::get('/recommendation-property', 'recommendationProperty')->name('property.recommendation');
    Route::get('/populer-property', 'populerProperty')->name('property.populer');

    // Ajax request route
    Route::get('get-five-properties', 'trendingProperty')->name('property.five_properties');
});

// Dashboard routes
Route::group(['middleware' => 'customer.auth'], function () {
    // customer prefix route
    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');
        Route::get('/profile', [CustomerController::class, 'profile'])->name('profile');
        Route::post('/profile', [CustomerController::class, 'profileUpdate'])->name('profile.update');
        Route::post('/password-update', [CustomerController::class, 'passwordUpdate'])->name('password.update');
        Route::get('/generate-personal-code', [CustomerController::class, 'generatePersonalCode'])->name('generatePersonalCode');

        Route::get('/properties', [CustomerController::class, 'properties'])->name('properties');
        Route::get('/properties/details/{id}', [CustomerController::class, 'propertyDetails'])->name('property.details');
        Route::get('/due-payments', [CustomerController::class, 'duePayment'])->name('due.payments');
        Route::get('/support-tickets', [CustomerController::class, 'supportTicket'])->name('support.tickets');
        Route::get('/settings', [CustomerController::class, 'setting'])->name('settings');
        // Wishlist route
        Route::get('/wishlists', [CustomerController::class, 'wishlist'])->name('wishlists');
        Route::post('/wishlists', [CustomerController::class, 'wishlistAdd'])->name('wishlists.add');
        Route::delete('/wishlists/{id}', [CustomerController::class, 'wishlistDelete'])->name('wishlists.delete');

        Route::post('/assets/store', [CustomerController::class, 'assetsStore'])->name('asset.store');
        Route::delete('/assets/delete/{id}', [CustomerController::class, 'assetsDelete'])->name('asset.delete');

        Route::get('/notifications', [CustomerController::class,'notifications'])->name('notifications');
        Route::get('/notifications/details/{id}', [CustomerController::class,'notificationDetails'])->name('notification_details');

        Route::controller(OrderController::class)->group(function () {
            Route::get('/orders',             'orderList')->name('orders');
            Route::get('/order-details/{id}', 'orderDetails')->name('order_detail');
            Route::get('/order-invoice/{id}', 'orderInvoice')->name('order_invoice');
            Route::post('/calculate-payment', 'calculatePayment')->name('calculate_payment');
            Route::post('/orders/payment',    'orderPayment')->name('orders.payment');
        });


        Route::controller(FamilyMemberController::class)->prefix('family-member')->as('family-member.')->group(function () {
            Route::get('create/{id}', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('delete/{id}', 'destroy')->name('delete');
            Route::get('/generate-personal-code', 'generatePersonalCode')->name('generatePersonalCode');
        });

        Route::controller(AccountCategoryController::class)->prefix('account_category')->as('account_category.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/udpate/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });

        // Account Route
        Route::controller(AccountController::class)->prefix('accounts')->as('account.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/udpate/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });
});


Route::as('cart.')->controller(CartController::class)->group(function () {
    Route::post('/cart/add-to-cart', 'ADDTOCART')->name('add_to_cart');
    Route::get('/cart/remove-from-cart/{id}', 'removeFromCart')->name('remove_from_cart');
    Route::get('/carts', 'cartList')->name('cart_list');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::post('/order', 'placeOrder')->name('order');
});


Route::controller(AppointmentController::class)->prefix('appointment')->as('appointment.')->group(function () {
    Route::post('/store', 'store')->name('store');
});

Route::get('fetch-cities', [MarslandController::class, 'getCities'])->name('fetch-cities');
Route::get('upload-property', [MarslandController::class, 'uploadProperty'])->name('upload_property');
