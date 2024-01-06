<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Manufacturing\Livewire\Orders\CreateOrderComponent;
use Obelaw\Manufacturing\Livewire\Orders\DetailOrderComponent;
use Obelaw\Manufacturing\Livewire\Orders\IndexOrdersComponent;
use Obelaw\Manufacturing\Livewire\Planning\CreatePlanComponent;
use Obelaw\Manufacturing\Livewire\Planning\DetailPlanComponent;
use Obelaw\Manufacturing\Livewire\Planning\IndexPlansComponent;
use Obelaw\Manufacturing\Livewire\Planning\UpdatePlanComponent;
use Obelaw\Manufacturing\Livewire\Products\IndexProductsComponent;
use Obelaw\Manufacturing\Livewire\Products\ProductVariantsComponent;
use Obelaw\Manufacturing\Livewire\Workers\CreateWorkerComponent;
use Obelaw\Manufacturing\Livewire\Workers\IndexWorkersComponent;
use Obelaw\Manufacturing\Livewire\Workers\UpdateWorkerComponent;

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

Route::prefix('manufacturing')->group(function () {
    Route::get('/', function () {
        return view('obelaw-manufacturing::home');
    })->name('obelaw.manufacturing.home');

    // products
    Route::prefix('products')->group(function () {
        Route::get('/', IndexProductsComponent::class)->name('obelaw.manufacturing.products.index');
        Route::get('/{product}/variants', ProductVariantsComponent::class)->name('obelaw.manufacturing.products.variants');
    });

    // planning
    Route::prefix('planning')->group(function () {
        Route::get('/', IndexPlansComponent::class)->name('obelaw.manufacturing.planning.index');
        Route::get('/create', CreatePlanComponent::class)->name('obelaw.manufacturing.planning.create');
        Route::get('/{plan}/update', UpdatePlanComponent::class)->name('obelaw.manufacturing.planning.update');
        Route::get('/{plan}/detail', DetailPlanComponent::class)->name('obelaw.manufacturing.planning.detail');
    });
    
    // orders
    Route::prefix('orders')->group(function () {
        Route::get('/', IndexOrdersComponent::class)->name('obelaw.manufacturing.orders.index');
        Route::get('/create', CreateOrderComponent::class)->name('obelaw.manufacturing.orders.create');
        Route::get('/{order}/detail', DetailOrderComponent::class)->name('obelaw.manufacturing.orders.detail');
    });

    // workers
    Route::prefix('workers')->group(function () {
        Route::get('/', IndexWorkersComponent::class)->name('obelaw.manufacturing.workers.index');
        Route::get('/create', CreateWorkerComponent::class)->name('obelaw.manufacturing.workers.create');
        Route::get('/{worker}/update', UpdateWorkerComponent::class)->name('obelaw.manufacturing.workers.update');
    });
});
