<?php

use Illuminate\Support\Facades\Route;
use Modules\LiveChat\Http\Controllers\MessageController;
use Modules\LiveChat\Http\Controllers\LiveChatController;

Route::prefix('admin')->group(function () {
    Route::controller(LiveChatController::class)->group(function () {
        Route::any('/live-chat', 'index')->name('livechat.index');
        Route::get('/live-chat-settings', 'setting')->name('livechat.setting');
        Route::post('/live-chat-settings', 'settingUpdate')->name('livechat.setting.update');
        Route::get('/chat-list', 'chatList')->name('livechat.chat_list');
    });

    Route::controller(MessageController::class)->group(function () {
        Route::any('/live-chat/{id}', 'chat')->name('livechat.chat')->middleware('PermissionCheck:live_chat_list');
        Route::post('/live-chat/store/{id}', 'store')->name('livechat.store')->middleware('PermissionCheck:live_chat_create');
    });
});

// student live chat
Route::prefix('student')->middleware(['student', 'auth', 'verified'])->group(function () {
    Route::controller(LiveChatController::class)->group(function () {
        Route::get('/live-chat', 'studentLiveChat')->name('student.live_chat');
        Route::get('/chat-list', 'studentChatList')->name('livechat.student_chat_list');
    });

    Route::controller(MessageController::class)->group(function () {
        Route::get('/live-chat/{id}', 'studentChat')->name('student_livechat.chat');
        Route::post('/live-chat/store/{id}', 'studentStore')->name('student_livechat.store');
    });
});
// Customer live chat
Route::prefix('customer')->middleware(['customer.auth'])->group(function () {
    Route::controller(LiveChatController::class)->group(function () {
        Route::get('/live-chat', 'customerLiveChat')->name('customer.live_chat');
        Route::get('/chat-list', 'customerChatList')->name('livechat.customer_chat_list');
    });

    Route::controller(MessageController::class)->group(function () {
        Route::get('/live-chat/{id}', 'customerChat')->name('customer_livechat.chat');
        Route::post('/live-chat/store/{id}', 'customerStore')->name('customer_livechat.store');
    });
});


// student live chat

// instructor live chat
Route::prefix('instructor')->middleware(['instructor', 'auth', 'verified'])->group(function () {
    Route::controller(LiveChatController::class)->group(function () {
        Route::get('/live-chat', 'instructorLiveChat')->name('instructor.live_chat');
        Route::get('/chat-list', 'instructorChatList')->name('livechat.instructor_chat_list');
    });

    Route::controller(MessageController::class)->group(function () {
        Route::get('/live-chat/{id}', 'instructorChat')->name('instructor_livechat.chat');
        Route::post('/live-chat/store/{id}', 'instructorStore')->name('instructor_livechat.store');
    });
});

Route::prefix('live-chat')->middleware(['auth'])->group(function () {
    Route::controller(MessageController::class)->group(function () {
        Route::get('message-read/{id}', 'messageRead');
    });
});
