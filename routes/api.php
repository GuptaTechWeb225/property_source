<?php

use App\Http\Controllers\Api\v1\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\v1\ReportController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\v1\DashboardController;
use App\Http\Controllers\Api\v1\TenantController;
use App\Http\Controllers\Api\v1\PropertyController;
use App\Http\Controllers\Api\v1\RentalController;
use App\Http\Controllers\Api\v1\CommitteeController;
use App\Http\Controllers\Api\v1\CommitteeMemberController;
use App\Http\Controllers\Api\v1\AccountController;
use App\Http\Controllers\Api\v1\AccountCategoryController;
use App\Http\Controllers\Api\v1\OrderController;
use App\Http\Controllers\Api\v1\BillController;
use App\Http\Controllers\Api\v1\NotificationController;

//use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Api\CashManagementController;
use App\Http\Controllers\Api\Property\PropertyApiController;

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

// Public API Routes
Route::prefix('public')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::any('notLogined', [AuthController::class, 'notLogined'])->name('notLogined');
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);

        Route::get('email/send/otp', [AuthController::class, 'requestOtp']);
        Route::post('email/verified/otp', [AuthController::class, 'verifyOtp']);
        Route::post('email/forgot-password', [AuthController::class, 'forgetPassword']);
        Route::post('email/reset-password', [AuthController::class, 'resetPassword']);

        Route::get('countries', [LocationController::class, 'getCountries']);
        Route::post('states', [LocationController::class, 'getStates']);
        Route::post('cities', [LocationController::class, 'getCities']);
    });
});


// Private API Routes
Route::prefix('private')->middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/profile', [AuthController::class, 'user']);
            Route::post('/profile-update', [AuthController::class, 'profileUpdate']);
            Route::post('/change-password', [AuthController::class, 'changePassword']);
            Route::post('/logout', [AuthController::class, 'logout']);

        });

        Route::prefix('tenant')->group(function () {
            Route::controller(TenantController::class)->group(function () {
                Route::get('/dashboard', 'dashboard');
                Route::get('/orders', 'orders'); // Purchase history
                Route::get('/order-details/{id}', 'orderDetails'); // Purchase history
                Route::get('/wishlist', 'wishlist');
                Route::get('/due-payment', 'duePayment');
            });
        });

        Route::get('/dashboard', [DashboardController::class, 'landlordDashboard']);

        Route::get('/notifications', [NotificationController::class, 'index']);
        // Landlord API Route
        Route::controller(CommitteeController::class)->prefix('committee')->group(function () {
            Route::get('/list', 'index');
            Route::get('/create', 'create');
            Route::post('/store', 'store');
            Route::get('/edit/{id}', 'edit');
            Route::get('/show/{id}', 'show');
            Route::put('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'destroy');
        });

        Route::controller(CommitteeMemberController::class)->prefix('committee-member')->group(function () {
            Route::get('/list', 'index');
            Route::get('/create', 'create');
            Route::post('/store', 'store');
            Route::put('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'destroy');
        });

        Route::controller(AccountCategoryController::class)->prefix('account-category')->group(function () {
            Route::get('/list', 'index');
            Route::get('/create', 'create');
            Route::post('/store', 'store');
            Route::post('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'destroy');
        });

        Route::controller(AccountController::class)->prefix('accounts')->group(function () {
            Route::get('/list', 'index');
            Route::get('/create', 'create');
            Route::post('/store', 'store');
            Route::post('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'destroy');
        });

        Route::controller(TenantController::class)->prefix('tenant')->group(function () {
            Route::get('/list', 'index');
            Route::get('/create', 'create');
            Route::post('/store', 'store');
            Route::get('/edit/{id}', 'edit');
            Route::get('/show/{id}', 'show');
            Route::post('/update/{id}', 'update');
        });

        Route::controller(RentalController::class)->prefix('rental')->group(function () {
            Route::get('/list', 'index');
        });

        Route::controller(OrderController::class)->prefix('order')->group(function () {
            Route::get('/list', 'index');
            Route::get('/details/{id}', 'orderDetails');
        });

        Route::controller(PropertyController::class)->prefix('property')->group(function () {
            Route::get('/list', 'index');
            Route::get('/create', 'create');
            Route::post('/store', 'store');
            Route::post('/update/{id}', 'update');
            Route::post('/delete', 'delete');
            Route::get('/info-list', 'infoList');
            Route::get('/{id}/details-list', 'detailsList');
            Route::get('/{id}/details/{type}', 'details');
            // Property Gallery
            Route::post('/add-gallery', 'addGallery');
            Route::delete('/delete-gallery/{id}', 'deleteGallery');
            // Property Facility
            Route::post('/add-facility', 'addFacility');
            Route::put('/update-facility/{id}', 'updateFacility');
            Route::delete('/delete-facility/{id}', 'deleteFacility');
            // Floor Plan
            Route::post('/add-floorplan', 'addFloorplan');
            Route::delete('/delete-floorplan/{id}', 'deleteFloorplan');
            // Document
            Route::post('/add-document', 'addDocument');
            Route::delete('/delete-document/{id}', 'deleteDocument');
            Route::post('/update-basic-info/{id}', 'updateBasicInfo');
        });

        Route::controller(BillController::class)->prefix('bill')->group(function () {
            Route::get('/list', 'index');
            Route::get('/bill-details/{id}', 'billDetails');
            Route::get('/occupied-property', 'occupiedProperty');
            Route::post('/generate-bill', 'generateBill');
            Route::post('/collect-bill', 'collectBill');
        });

        Route::get('category-properties', [PropertyController::class, 'categoryWiseProperties']);
        Route::get('properties', [PropertyController::class, 'properties']);
        Route::get('property-search-field', [PropertyController::class, 'propertySearchField']);
        Route::get('property-details/{slug}', [PropertyController::class, 'propertyDetails']);

        Route::controller(PropertyController::class)->prefix('wishlists')->group(function () {
            Route::post('add', 'wishlistAdd');
            Route::delete('delete/{id}', 'wishlistDelete');
        });

        Route::controller(TransactionController::class)->prefix('transactions')->group(function () {
            Route::get('landlord-transactions', 'landlordTransactionHistory');
            Route::delete('delete/{id}', 'wishlistDelete');
        });

        Route::controller(ReportController::class)->prefix('reports')->group(function () {
            Route::get('properties', 'propertyList');
            Route::get('tenants', 'tenantList');
            Route::get('tenant-report', 'tenantReport');
            Route::get('payment-report', 'paymentReport');
        });

        Route::controller(ReportController::class)->prefix('reports')->group(function () {
            Route::get('tenant-report', 'tenantReport');
            Route::get('payment-report', 'paymentReport');
        });

        Route::prefix('options')->group(function () {
            Route::get('/properties', [PropertyController::class, 'propertyList']);
            Route::get('/tenants', [TenantController::class, 'tenantList']);
            Route::get('/tenant-accounts', [TenantController::class, 'tenantAccountList']);
        });

    });
});


Route::get('countries', [LocationController::class, 'getCountries']);
Route::post('divisions', [LocationController::class, 'getDivision']);
Route::post('districts', [LocationController::class, 'getdistricts']);


