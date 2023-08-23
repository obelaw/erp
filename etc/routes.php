<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Accounting\Http\Livewire\COA\CreateComponent;
use Obelaw\Accounting\Http\Livewire\COA\IndexComponent;
use Obelaw\Accounting\Http\Controllers\HomeController;
use Obelaw\Accounting\Http\Livewire\Entries\CreateEntryComponent;
use Obelaw\Accounting\Http\Livewire\Entries\IndexEntriesComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\CreatePriceListComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\IndexPriceListComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\ItemsPriceListComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\UpdatePriceListComponent;

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
});
