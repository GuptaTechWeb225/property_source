<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Nestkeeper\Http\Controllers\Api\AuthController;
use Modules\Nestkeeper\Http\Controllers\Api\SettingController;
use Modules\Nestkeeper\Http\Controllers\Api\PropertyController;
use Modules\Nestkeeper\Http\Controllers\Api\NotificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'nestkeeper'], function () {
    Route::get('/dummy',               [PropertyController::class, 'dummy']);
    Route::post('/register',            [AuthController::class, 'register']);
    Route::post('/login',               [AuthController::class, 'login']);

    Route::post('send-otp',             [AuthController::class, 'sendOtp']);
    Route::post('verify-otp',           [AuthController::class, 'verifyOtp']);

    Route::post('forgot-password',      [AuthController::class, 'forgetPassword']);
    Route::post('reset-password',       [AuthController::class, 'resetPassword']);



    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('/change-password',        [AuthController::class, 'changePassword']);
        Route::get('/profile',                 [AuthController::class, 'profile']);
        Route::post('/profile-update',         [AuthController::class, 'profileUpdate']);

        Route::get('/home',                    [PropertyController::class, 'index']);  // Use this method at home api
        Route::post('/autocomplete-search',    [PropertyController::class, 'autocompleteSearch']);  // Use this method at home api

        Route::group(['prefix' => 'property'], function () {
            Route::get('/list',                 [PropertyController::class, 'list'])->name('api.properties.list');
            Route::get('/create',               [PropertyController::class, 'create'])->name('api.properties.create');
            Route::post('/store',               [PropertyController::class, 'store'])->name('api.properties.store');
            Route::get('/createAdvertisements', [PropertyController::class, 'createAdvertisements']);
            Route::post('/storeAdvertisements/rent', [PropertyController::class, 'storeAdvertisementsRent'])->name('api.properties.storeAdvertisementsRent');
            Route::post('/storeAdvertisements/sell', [PropertyController::class, 'storeAdvertisementsSell'])->name('api.properties.storeAdvertisementsSell');
            Route::get('/info-list',            [PropertyController::class, 'infoList'])->name('api.tenants.infoList');
            Route::get('{id}/details-list',     [PropertyController::class, 'detailsList']);
            Route::get('{id}/details/{type}',   [PropertyController::class, 'details'])->name('api.properties.api.index'); //api/property/1/details/basic


            // edit
            Route::get('/edit/{id}/basicinfo',  [PropertyController::class, 'edit'])->name('api.properties.edit');
            // property update
            Route::post('/update/{id}/basicinfo',[PropertyController::class, 'update'])->name('api.properties.update');

            // gallery add
            Route::post('/gallery-floorplan/store',[PropertyController::class, 'galleryFloorplanStore'])->name('api.properties.galleryFloorplan.store');

            // facility edit
            Route::get('/facility/edit/{id}',       [PropertyController::class, 'facilityEdit'])->name('api.properties.facility.edit');
            // facility update
            Route::post('/facility/update/{id}',    [PropertyController::class, 'facilityUpdate'])->name('api.properties.facility.update');

            Route::get('/my-property/{type}',       [PropertyController::class, 'myProperty']);
            Route::post('/wishlist/store',          [PropertyController::class, 'wishlistStore']);
            Route::get('/wishlists',                [PropertyController::class, 'wishlists']);

            Route::post('/request/store',          [PropertyController::class, 'requestProperyStore']);
            Route::get('/request/list',            [PropertyController::class, 'getRequestPropery']);
            Route::post('/request/delete',         [PropertyController::class, 'deleteRequestPropery']);
        });

        Route::group(['prefix' => 'settings'], function () {
            Route::get('/',                           [SettingController::class, 'index']);
            Route::get('/create',                     [SettingController::class, 'create']);
            Route::post('/store',                     [SettingController::class, 'store']);
        });
    });

    Route::group(['prefix' => 'notifications'], function () {
        Route::get('/', [NotificationController::class, 'index'])->name('notifications.index');

    });
});
