<?php

use App\Http\Controllers\Frontend\FrontendPropertyController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['XssSanitizer', 'lang']], function () {
    Route::get('property/{id}/details/{slug}',  [FrontendPropertyController::class, 'propertyDetails'])->name('frontend.property.show');

    Route::any('/properties',                   [FrontendPropertyController::class, 'index'])->name('properties');
    Route::get('/property-details',             [HomeController::class, 'propertyDetails'])->name('properties.details');
    Route::post('/property-review/{id}',        [HomeController::class, 'propertyReview'])->name('propertyReview');

    Route::any('properties-filters',            [FrontendPropertyController::class, 'propertyFilters'])->name('properties.filters');
    Route::any('properties-trending',           [FrontendPropertyController::class, 'getTrendingProperties'])->name('getTrendingProperties');
    Route::any('properties-buy',                [FrontendPropertyController::class, 'getBuyProperties'])->name('getBuyProperties');
    Route::any('properties-rent',               [FrontendPropertyController::class, 'getRentProperties'])->name('getRentProperties');

    Route::any('properties-categories',         [FrontendPropertyController::class, 'propertyCategories'])->name('properties.categories');
    Route::any('getHotCategories',              [FrontendPropertyController::class, 'getHotCategories'])->name('getHotCategories');
    Route::any('getRecommendationForYou',       [FrontendPropertyController::class, 'getRecommendationForYou'])->name('getRecommendationForYou');

    Route::any('properties-relared',           [FrontendPropertyController::class, 'getRelatedProperties'])->name('getRelatedProperties');

    Route::controller(CartController::class)->group(function () {
        Route::post('cart/add-to-cart','addToCart')->name('cart.addtocart');
        Route::post('cart/store',  'store');
    });
    Route::controller(WishlistController::class)->group(function () {

        Route::post('wishlist/store',  'wishlistStore');
    });

    Route::any('subscribe',              [FrontendPropertyController::class, 'subscribe'])->name('subscribe');

    //Property availability check
    Route::post('property/check',  [FrontendPropertyController::class, 'propertyCheck'])->name('frontend.property.check');


});

