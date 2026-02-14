<?php

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

// Dashboard routes
Route::group(['middleware' => 'customer.auth'], function () {
    // customer prefix route
    Route::prefix('customer')->group(function () {
        Route::get('/dashboard',                [CustomerController::class, 'dashboard'])->name('customer.dashboard');
        Route::post('/logout',                  [CustomerController::class, 'logout'])->name('customer.logout');

        Route::get('/purchase-history',         [CustomerController::class, 'purchaseHistory'])->name('customer.purchaseHistory');
        Route::get('/refund',                   [CustomerController::class, 'refund'])->name('customer.refund');
        Route::get('/referral',                 [CustomerController::class, 'referral'])->name('customer.referral');
        Route::get('/notification',             [CustomerController::class, 'notification'])->name('customer.notification');
        Route::get('/cart',                     [CustomerController::class, 'cart'])->name('customer.cart');
        Route::delete('/cart/{id}',             [CustomerController::class, 'removeCart'])->name('customer.removeCart');
        Route::delete('/wishlist/{id}',         [CustomerController::class, 'removeWishlist'])->name('customer.removeWishlist');
        Route::get('/checkout',                 [CustomerController::class, 'checkout'])->name('customer.checkout');
        Route::post('/wishlist',                [CustomerController::class, 'wishlist'])->name('wishlist.add');
        Route::post('/billing-address',         [CustomerController::class, 'billingAddress'])->name('customer.billingAddress');
        Route::post('/checkout-process',        [CustomerController::class, 'checkOutProcess'])->name('customer.checkOutProcess');
        Route::post('/place-order',             [CustomerController::class, 'placeOrder'])->name('customer.placeOrder');
        Route::get('/shopping',                 [CustomerController::class, 'shopping'])->name('customer.shopping');
        Route::get('/payment',                  [CustomerController::class, 'payment'])->name('customer.payment');
        Route::get('/profile',                  [CustomerController::class, 'profile'])->name('customer.profile');
        Route::get('/change-password',          [CustomerController::class, 'changePassword'])->name('customer.changePassword');
        Route::get('/my-orders',                [CustomerController::class, 'myOrders'])->name('customer.myOrders');
        Route::get('/order-details/{id}',       [CustomerController::class, 'orderDetails'])->name('customer.orderDetails');
        Route::get('/invoice-download/{id}',    [CustomerController::class, 'invoiceDownload'])->name('customer.invoiceDownload');
        Route::get('/due-payment',              [CustomerController::class, 'duePayment'])->name('customer.duePayment');
        Route::get('/refund-details',           [CustomerController::class, 'refundDetails'])->name('customer.refundDetails');
        Route::get('/my-coupon',                [CustomerController::class, 'myCoupon'])->name('customer.myCoupon');
        Route::get('/my-wishlist',              [CustomerController::class, 'myWishlist'])->name('customer.myWishlist');
        Route::get('/my-account',               [CustomerController::class, 'myAccount'])->name('customer.myAccount');
        Route::get('/support-ticket',           [CustomerController::class, 'supportTicket'])->name('customer.supportTicket');
        Route::post('/update-profile',          [CustomerController::class, 'updateProfile'])->name('customer.updateProfile');
        Route::post('/update-password',         [CustomerController::class, 'updatePassword'])->name('customer.updatePassword');
        Route::post('/update-account',          [CustomerController::class, 'updateAccount'])->name('customer.updateAccount');
        Route::get('/edit-address/{id}',        [CustomerController::class, 'editAddress'])->name('customer.editAddress');
        Route::get('/edit-emergency/{id}',      [CustomerController::class, 'editemergency'])->name('customer.editemergency');
        Route::post('/update-address/{id}',     [CustomerController::class, 'updateAddress'])->name('customer.updateAddress');
        Route::post('/update-emergency/{id}',        [CustomerController::class, 'updateEmergency'])->name('customer.updateEmergency');
        Route::get('/payment-success',           [CustomerController::class, 'paypalPaymentSuccess'])->name('customer.paypalPaymentSuccess');
        Route::get('/payment-cancelled',           [CustomerController::class, 'paypalPaymentCancelled'])->name('customer.paypalPaymentCancelled');

        Route::get('/verify-address',      [CustomerController::class, 'verifyAddress'])->name('customer.verifyAddress');
    });
});
