<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Accounting\Http\Controllers\HomeController;
use Obelaw\Accounting\Http\Livewire\COA\CreateComponent;
use Obelaw\Accounting\Http\Livewire\COA\IndexComponent;
use Obelaw\Accounting\Http\Livewire\COA\ShowComponent;
use Obelaw\Accounting\Http\Livewire\Entries\CreateEntryComponent;
use Obelaw\Accounting\Http\Livewire\Entries\IndexEntriesComponent;
use Obelaw\Accounting\Http\Livewire\Payments\CreatePaymentComponent;
use Obelaw\Accounting\Http\Livewire\Payments\IndexPaymentsComponent;
use Obelaw\Accounting\Http\Livewire\Payments\UpdatePaymentComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\CreatePriceListComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\IndexPriceListComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\ItemsPriceListComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\UpdatePriceListComponent;
use Obelaw\Accounting\Http\Livewire\Reporting\TheCOAReporting;
use Obelaw\Accounting\Http\Livewire\Vendors\CreateVendorComponent;
use Obelaw\Accounting\Http\Livewire\Vendors\IndexVendorsComponent;
use Obelaw\Accounting\Http\Livewire\Vendors\ShowVendorComponent;
use Obelaw\Accounting\Http\Livewire\Vendors\UpdateVendorComponent;

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

Route::prefix('accounting')->group(function () {
    Route::get('/', HomeController::class)->name('obelaw.accounting.home');

    // COA
    Route::prefix('coa')->group(function () {
        Route::get('/index', IndexComponent::class)->name('obelaw.accounting.coa.index');
        Route::get('/create', CreateComponent::class)->name('obelaw.accounting.coa.create');
        Route::get('/{account}/show', ShowComponent::class)->name('obelaw.accounting.coa.show');
    });

    // Entries
    Route::prefix('entries')->group(function () {
        Route::get('/index', IndexEntriesComponent::class)->name('obelaw.accounting.entries.index');
        Route::get('/create', CreateEntryComponent::class)->name('obelaw.accounting.entries.create');
    });

    // Price List
    Route::prefix('price-list')->group(function () {
        Route::get('/index', IndexPriceListComponent::class)->name('obelaw.accounting.price_list.index');
        Route::get('/create', CreatePriceListComponent::class)->name('obelaw.accounting.price_list.create');
        Route::get('/{list}/update', UpdatePriceListComponent::class)->name('obelaw.accounting.price_list.update');
        Route::get('/{list}/items', ItemsPriceListComponent::class)->name('obelaw.accounting.price_list.items');
    });

    // Vendors
    Route::prefix('vendors')->group(function () {
        Route::get('/index', IndexVendorsComponent::class)->name('obelaw.accounting.vendors.index');
        Route::get('/create', CreateVendorComponent::class)->name('obelaw.accounting.vendors.create');
        Route::get('/{vendor}/update', UpdateVendorComponent::class)->name('obelaw.accounting.vendors.update');
        Route::get('/{vendor}/show', ShowVendorComponent::class)->name('obelaw.accounting.vendors.show');
        
        // Payments
        Route::prefix('payments')->group(function () {
            Route::get('/index', IndexPaymentsComponent::class)->name('obelaw.accounting.payments.index');
            Route::get('/create', CreatePaymentComponent::class)->name('obelaw.accounting.payments.create');
            Route::get('/{payment}/update', UpdatePaymentComponent::class)->name('obelaw.accounting.payments.update');
        });
    });

    // Reporting
    Route::prefix('reporting')->group(function () {
        Route::get('/coa', TheCOAReporting::class)->name('obelaw.accounting.reporting.coa');
    });
});
