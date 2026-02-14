<?php

use App\Mail\EmailVerification;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\Image;
use App\Models\Locations\Country;
use App\Models\Property\Property;
use App\Models\Property\PropertyCategory;
use App\Models\Property\PropertyGallery;
use App\Models\Property\PropertyLocation;
use App\Models\Property\PropertyTenant;
use App\Models\State;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Backend\AuthenticationController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Frontend\AppointmentController;
use App\Models\Page;
use App\Http\Controllers\PushNotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('vuejs', 'welcome');

include_route_files(__DIR__ . '/Admin/');
include_route_files(__DIR__ . '/Customer/');
include_route_files(__DIR__ . '/Frontend/');
// Auth::routes();

Route::get('lock-screen', [AuthenticationController::class, 'lockScreenPage'])->name('lock-screen');
Route::get('-reset-my-database', [ManagerController::class, 'index'])->name('i-am-sure-to-reset-my-database');

Route::group(['middleware' => ['XssSanitizer', 'lang', 'not.auth.routes']], function () {

    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('login', 'loginPage')->name('login');
        Route::post('login', 'login')->name('login.auth');
        Route::get('register', 'registerPage')->name('register');
        Route::post('register', 'register')->name('register');
        Route::get('verify-email/{email}/{token}', 'verifyEmail')->name('verify-email');

        // reset password
        Route::get('forgot-password', 'forgotPasswordPage')->name('forgot-password');
        Route::post('forgot-password', 'forgotPassword')->name('forgot.password');

        Route::get('reset-password/{email}/{token}', 'resetPasswordPage')->name('reset-password');
        Route::post('reset-password', 'resetPassword')->name('reset.password');
    });
});
Route::group(['middleware' => ['auth']], function () {
    Route::post('logout', [App\Http\Controllers\Backend\AuthenticationController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'lang'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
});
// Frontend routes

// User routes
Route::get('/order-tracking', [HomeController::class, 'orderTracking'])->name('orderTracking');
Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');

// Informational routes
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/error', [HomeController::class, 'error'])->name('error');

// Properties routes
Route::get('/properties', [HomeController::class, 'properties'])->name('properties');
Route::get('/property-details', [HomeController::class, 'propertyDetails'])->name('properties.details');

// Blog routes
Route::prefix('blogs')->group(function () {
    Route::get('/', [HomeController::class, 'blogs'])->name('blogs');
    Route::get('/details/{slug}', [HomeController::class, 'blogDetails'])->name('blogDetails');
    Route::post('/blogs-review/{blogId}', [HomeController::class, 'blogReview'])->name('blogReview');
});


Route::get('send-email', function () {
    try {
        $user = User::where('email', 'onestdev124@gmail.com')->first();
        if (env('EMAIL_VERIFIED')) {
            $user->email_verified_at = now();
            $user->save();
        } else {
            Mail::to($user->email)->send(new EmailVerification($user));
            Log::info("mail send to user " . $user->email);
        }
    } catch (\Throwable $th) {
        Log::error($th);
    }
});

// START:: Category Routes
Route::get('/category/{slug}', [HomeController::class, 'categoryWiseProperties'])->name('categoryWiseProperties');

Route::get('page/{slug}', [PageController::class, 'index'])->name('view-page');


Route::get('/backup-pages', [PageController::class, 'backupPages']);
//Change User Lang
Route::post('/ajax-lang-change', [LanguageController::class, 'ajaxLangChange'])->name('language.ajaxLangChange');
Route::get('languages/change', [LanguageController::class, 'changeLanguage'])->name('languages.change');
// END:: Category Routes

Route::get('get-properties', [HomeController::class, 'getProperties'])->name('get-properties');
Route::controller(AppointmentController::class)->prefix('appointment')->as('appointment.')->group(function () {
    Route::post('/store', 'store')->name('store');
});

Route::get('upload-property', [HomeController::class, 'uploadProperty'])->name('upload_property');


Route::controller(PushNotificationController::class)->group(function () {
    Route::get('api/push-notification/authenticated-user', 'authUser');
    Route::post('api/push-notification/setToken', 'setToken');
    Route::get('push-notification/notification', 'notification');
});


Route::get('cache-clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return true;
})->middleware('auth');
