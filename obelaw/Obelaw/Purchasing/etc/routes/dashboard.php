<?php

use Illuminate\Support\Facades\Route;

use Obelaw\Purchasing\Livewire\Bills\IndexBillsComponent;
use Obelaw\Purchasing\Livewire\Bills\OpenBillComponent;
use Obelaw\Purchasing\Livewire\HomeController;
use Obelaw\Purchasing\Livewire\PurchaseOrders\CreatePurchaseOrderComponent;
use Obelaw\Purchasing\Livewire\PurchaseOrders\IndexPurchaseOrdersComponent;
use Obelaw\Purchasing\Livewire\PurchaseOrders\OpenPurchaseOrderComponent;
use Obelaw\Purchasing\Livewire\Vendors\CreateVendorComponent;
use Obelaw\Purchasing\Livewire\Vendors\IndexVendorsComponent;
use Obelaw\Purchasing\Livewire\Vendors\ShowVendorComponent;
use Obelaw\Purchasing\Livewire\Vendors\UpdateVendorComponent;

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

Route::prefix('purchasing')->group(function () {
    Route::get('/', HomeController::class)->name('obelaw.purchasing.home');


    Route::prefix('po')->group(function () {
        Route::get('/index', IndexPurchaseOrdersComponent::class)->name('obelaw.purchasing.po.index');
        Route::get('/create', CreatePurchaseOrderComponent::class)->name('obelaw.purchasing.po.create');
        Route::get('/{order}/open', OpenPurchaseOrderComponent::class)->name('obelaw.purchasing.po.open');
    });

    Route::prefix('bills')->group(function () {
        Route::get('/index', IndexBillsComponent::class)->name('obelaw.purchasing.bills.index');
        Route::get('/{bill}/open', OpenBillComponent::class)->name('obelaw.purchasing.bills.open');
    });
    
    // Vendors
    Route::prefix('vendors')->group(function () {
        Route::get('/index', IndexVendorsComponent::class)->name('obelaw.purchasing.vendors.index');
        Route::get('/create', CreateVendorComponent::class)->name('obelaw.purchasing.vendors.create');
        Route::get('/{vendor}/update', UpdateVendorComponent::class)->name('obelaw.purchasing.vendors.update');
        Route::get('/{vendor}/show', ShowVendorComponent::class)->name('obelaw.purchasing.vendors.show');
    });
});
