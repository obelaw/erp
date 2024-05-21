<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Accounting\Livewire\COA\CreateComponent;
use Obelaw\Accounting\Livewire\COA\IndexComponent;
use Obelaw\Accounting\Livewire\COA\ShowComponent;
use Obelaw\Accounting\Livewire\Configurations\PaymentMethods\CreatePaymentMethodsComponent;
use Obelaw\Accounting\Livewire\Configurations\PaymentMethods\IndexPaymentMethodsComponent;
use Obelaw\Accounting\Livewire\Configurations\PaymentMethods\UpdatePaymentMethodsComponent;
use Obelaw\Accounting\Livewire\Entries\CreateEntryComponent;
use Obelaw\Accounting\Livewire\Entries\IndexEntriesComponent;
use Obelaw\Accounting\Livewire\Entries\ShowEntriesComponent;
use Obelaw\Accounting\Livewire\HomeController;
use Obelaw\Accounting\Livewire\Payments\CreatePaymentComponent;
use Obelaw\Accounting\Livewire\Payments\IndexPaymentsComponent;
use Obelaw\Accounting\Livewire\Payments\UpdatePaymentComponent;
use Obelaw\Accounting\Livewire\PriceList\CreatePriceListComponent;
use Obelaw\Accounting\Livewire\PriceList\IndexPriceListComponent;
use Obelaw\Accounting\Livewire\PriceList\ItemsPriceListComponent;
use Obelaw\Accounting\Livewire\PriceList\UpdatePriceListComponent;
use Obelaw\Accounting\Livewire\Reporting\TheCOAReporting;
use Obelaw\Accounting\Livewire\Reporting\TheGLReporting;

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
        Route::get('/{entry}/show', ShowEntriesComponent::class)->name('obelaw.accounting.entries.show');
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
        Route::get('/gl', TheGLReporting::class)->name('obelaw.accounting.reporting.gl');
    });

    // Configurations
    Route::prefix('configurations')->group(function () {
        Route::prefix('payment-methods')->group(function () {
            Route::get('/', IndexPaymentMethodsComponent::class)->name('obelaw.accounting.configurations.payment-methods.index');
            Route::get('/create', CreatePaymentMethodsComponent::class)->name('obelaw.accounting.configurations.payment-methods.create');
            Route::get('/{method}/update', UpdatePaymentMethodsComponent::class)->name('obelaw.accounting.configurations.payment-methods.update');
        });
    });
});
