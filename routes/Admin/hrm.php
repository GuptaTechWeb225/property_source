<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Hrm\DepartmentController;
use App\Http\Controllers\Backend\Hrm\DesignationController;
use App\Http\Controllers\Backend\Hrm\EmployeeController;
use App\Http\Controllers\Backend\Hrm\LeaveTypeController;
Route::group(['middleware' => ['auth.routes']], function () {
    Route::controller(DepartmentController::class)->prefix('department')->as('department.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware();
        Route::get('/create', 'create')->name('create');
        Route::post('store', 'store')->name('store')->middleware();
        Route::get('edit/{id}', 'edit')->name('edit')->middleware();
        Route::put('update/{id}', 'update')->name('update')->middleware();
        Route::delete('destroy/{id}', 'destroy')->name('destroy')->middleware();
    });
    Route::controller(DesignationController::class)->prefix('designation')->as('designation.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware();
        Route::get('/create', 'create')->name('create');
        Route::post('store', 'store')->name('store')->middleware();
        Route::get('edit/{id}', 'edit')->name('edit')->middleware();
        Route::put('update/{id}', 'update')->name('update')->middleware();
        Route::delete('destroy/{id}', 'destroy')->name('destroy')->middleware();
    });

    Route::controller(EmployeeController::class)->prefix('employee')->as('employee.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware();
        Route::get('/create', 'create')->name('create');
        Route::post('store', 'store')->name('store')->middleware();
        Route::get('edit/{id}', 'edit')->name('edit')->middleware();
        Route::put('update/{id}', 'update')->name('update')->middleware();
        Route::delete('destroy/{id}', 'destroy')->name('destroy')->middleware();
    });

    Route::controller(LeaveTypeController::class)->prefix('leave-type')->as('leavetype.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware();
        Route::get('/create', 'create')->name('create');
        Route::post('store', 'store')->name('store')->middleware();
        Route::get('edit/{id}', 'edit')->name('edit')->middleware();
        Route::put('update/{id}', 'update')->name('update')->middleware();
        Route::delete('destroy/{id}', 'destroy')->name('destroy')->middleware();
    });
});
