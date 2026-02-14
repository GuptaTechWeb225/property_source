<?php

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

use Modules\BilnetPropertyOwnerForm\Http\Controllers\OTPController;
use Modules\BilnetPropertyOwnerForm\Http\Controllers\PropertyOwnerDocumentRequestController;

Route::prefix('register/landlord')->middleware('guest')->group(function () {
    Route::get('/', 'BilnetPropertyOwnerFormController@index')->name('property_owner_register');
    Route::post('/retrive-progress', 'BilnetPropertyOwnerFormController@retriveProgress')->name('retrive_progress');
    Route::get('/{form_token}/{slide_no}', 'BilnetPropertyOwnerFormController@getTemporaryFormData')->name('get_property_form')->middleware('web');;
    Route::post('/submit', 'BilnetPropertyOwnerFormController@formSubmit')->name('owner_form_submit')->middleware('web');;
    Route::post('/create', 'BilnetPropertyOwnerFormController@createTemporaryOwner')->name('create_temporary_owner')->middleware('web');;
    Route::post('/{token}/{slide_no}', 'BilnetPropertyOwnerFormController@updateFormData')->name('update_form_data')->middleware('web');;
    Route::post('/upload-file', 'BilnetPropertyOwnerFormController@upload')->name('form_file_uploader')->middleware('web');
    Route::post('/send-otp', [OTPController::class, 'sendOTP'])->name('send.otp')->middleware('web');
    Route::post('/verify-otp', [OTPController::class, 'verifyOTP'])->name('verify.otp')->middleware('web');
    Route::post('/send-document-request', [PropertyOwnerDocumentRequestController::class, 'sendDocumentRequest'])->name('send_document_request')->middleware('web');
});


Route::group(['middleware' => ['auth.routes']], function () {
    Route::get('/my/profile/property-owner-form/{slide_no}', 'BilnetPropertyOwnerFormController@getMyFormData')->name('get_my_form_data');
    Route::get('/profile/property-owner-form/{user_id}/{slide_no}', 'BilnetPropertyOwnerFormController@getPropertyOwnerFormData')->name('property_owner_form_data');
});
