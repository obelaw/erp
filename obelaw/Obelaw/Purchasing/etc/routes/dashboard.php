<?php

use Illuminate\Support\Facades\Route;

use Obelaw\Purchasing\Livewire\HomeController;
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

    // Vendors
    Route::prefix('vendors')->group(function () {
        Route::get('/index', IndexVendorsComponent::class)->name('obelaw.purchasing.vendors.index');
        Route::get('/create', CreateVendorComponent::class)->name('obelaw.purchasing.vendors.create');
        Route::get('/{vendor}/update', UpdateVendorComponent::class)->name('obelaw.purchasing.vendors.update');
        Route::get('/{vendor}/show', ShowVendorComponent::class)->name('obelaw.purchasing.vendors.show');
    });
});
