<?php

use Illuminate\Support\Facades\Route;
use Modules\Mailbox\Http\Controllers\NewMailboxController;
use Modules\Mailbox\Http\Controllers\MailboxController;
use Modules\Mailbox\Http\Controllers\MailboxTemplateController;

Route::group([
    'middleware'    => ['auth.routes'],
    'prefix'        => 'mailboxes',
    'as'            => 'mailboxes.'
], function () {
    Route::controller(MailboxController::class)->group(function () {
        Route::get('/',             'index')->name('index');
        Route::get('create',        'create')->name('create');
        Route::post('/',            'store')->name('store');
        Route::get('/{id}',         'show')->name('show');
        Route::post('delete',       'delete')->name('delete');
    });
});

// New
Route::group([
    'middleware'    => ['auth.routes'],
    'prefix'        => 'email/box',
    'as'            => 'email.box.'
], function () {
    Route::controller(NewMailboxController::class)->group(function () {
        Route::any('/',             'index')->name('index');
        Route::any('/details/{id}',             'show')->name('show');
        Route::any('create',        'create')->name('create');
        Route::any('/store',            'store')->name('store');
        Route::any('/delete/{id}',       'delete')->name('delete');
        Route::any('/load/email/tools/{data_ids}',       'loadEmailTools')->name('load.tools');

        Route::any('/draft/reply/{id}',       'draftReply')->name('draft.reply');
        Route::any('/print',       'print')->name('print');


        Route::any('/export/mailbox', 'exportToExcel')->name('export');
        Route::any('/type/filter', 'filterMailbox')->name('filter.type');
        Route::any('/manage/important/ajax', 'manageImportant')->name('manage.important');
        Route::any('/manage/starred/ajax', 'manageStarred')->name('manage.starred');
        Route::any('/trash/list', 'trashDataIndex')->name('trash.index');
        Route::any('/trash/remove/{id}', 'trashDataRemove')->name('trash.remove');

        Route::any('/group/starred', 'groupStarred')->name('group.starred');
        Route::any('/group/not/starred', 'groupNotStarred')->name('group.not.starred');
        Route::any('/group/bookmarked', 'groupBookmarked')->name('group.bookmarked');
        Route::any('/group/not/bookmarked', 'groupNotBookmarked')->name('group.not.bookmarked');
        Route::any('/group/mark/read', 'groupRead')->name('mark.read');
        Route::any('/group/unread', 'groupNotRead')->name('mark.unread');
        Route::any('/mark/group/trash', 'groupTrash')->name('group.trash');
        Route::any('/test/duplicate/file', 'duplicateFileTest')->name('duplicate.file');
        Route::get('/invoices', 'fetchInvoices')->name('fetch.invoices');
        Route::get('/estimates', 'fetchEstimates')->name('fetch.estimate');
        Route::get('/proposals', 'fetchProposals')->name('fetch.proposal');
        Route::get('/orders', 'fetchOrders')->name('fetch.order');
        Route::get('/contracts', 'fetchContracts')->name('fetch.contract');
        Route::get('/tickets', 'fetchTickets')->name('fetch.ticket');
        Route::get('/notes', 'fetchNotes')->name('fetch.note');
        Route::get('/event', 'fetchEvents')->name('fetch.event');
        Route::get('/customer', 'fetchCustomers')->name('fetch.customer');
        Route::get('/project/payments', 'fetchProjectPayments')->name('fetch.project.payment');
        Route::get('/sale/payments', 'fetchSalePayments')->name('fetch.sale.payment');
    });
});

Route::group([
    'prefix'        => 'mailbox/template',
    'as'            => 'mailbox.template.'
], function () {
    Route::controller(MailboxTemplateController::class)->group(function () {
        Route::any('/',             'index')->name('index');
        Route::any('/details/{id}', 'show')->name('show');
        Route::any('/edit/{id}', 'edit')->name('edit');
        Route::any('/update/{id}', 'update')->name('update');
        Route::any('create',        'create')->name('create');
        Route::any('/store',        'store')->name('store');
        Route::any('/delete/{id}',  'delete')->name('delete');
    });
});
