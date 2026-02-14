<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Landlord\LandlordSettingController;
use App\Http\Controllers\Landlord\LandlordDashboardController;
use \App\Http\Controllers\Landlord\LandlordPropertyController;
use \App\Http\Controllers\Landlord\RequirementController;
// auth routes

Route::group(['middleware' => ['landlord.auth.routes']], function () {
    Route::prefix('landlord')->name('landlord.')->group(function (){
        Route::get('/summaries',[LandlordDashboardController::class,'summary'])->name('summary');
        Route::get('/finances',[LandlordDashboardController::class,'finances'])->name('finances');
        Route::get('/maintenance',[LandlordDashboardController::class,'maintenance'])->name('maintenance');
        Route::post('/make-favourite',[LandlordDashboardController::class,'makeFavourite'])->name('makeFavourite');
        Route::post('/remove-favourite',[LandlordDashboardController::class,'removeFavourite'])->name('removeFavourite');

        Route::prefix('requirements')->controller(RequirementController::class)->name('requirement.')->group(function () {
            Route::get('/index','index')->name('index');
            Route::post('/update','update')->name('update');
            Route::get('view',  'view')->name('view');

            Route::get('offers',  'offer')->name('offer');
            Route::post('store-offer',  'offerStore')->name('offer-store');

            Route::get('documents',  'document')->name('document');
            Route::post('document-store',  'documentStore')->name('document.store');
            Route::get('get-property',  'getProperty')->name('offer.get-property');
        });

        Route::prefix('properties')->controller(LandlordPropertyController::class)->name('property.')->group(function () {
            Route::get('/index','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::put('/update/{id}','update')->name('update');
            Route::delete('/delete/{id}','delete')->name('delete');

            Route::get('views',  'views')->name('views');
            Route::get('documents',  'document')->name('document');
            Route::get('offers',  'offer')->name('offer');
            Route::get('offer-update-status/{id}',  'offerStatusUpdate')->name('offer.status-update');
        });

        Route::match(['get','post'],'/settings',[LandlordSettingController::class,'updateProfile'])->name('setting');
    });
});
