<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Warehouse\Http\Controllers\HomeController;
use Obelaw\Warehouse\Livewire\Adjustments\AdjustmentsCreateComponent;
use Obelaw\Warehouse\Livewire\Adjustments\AdjustmentShowComponent;
use Obelaw\Warehouse\Livewire\Adjustments\AdjustmentsIndexComponent;
use Obelaw\Warehouse\Livewire\Inventories\InventoriesIndexComponent;
use Obelaw\Warehouse\Livewire\Inventories\InventoryCreateComponent;
use Obelaw\Warehouse\Livewire\Inventories\InventoryShowComponent;
use Obelaw\Warehouse\Livewire\Inventories\InventoryUpdateComponent;
use Obelaw\Warehouse\Livewire\SerialNumbers\DetailSerialNumberComponent;
use Obelaw\Warehouse\Livewire\SerialNumbers\SerialNumbersIndexComponent;
use Obelaw\Warehouse\Livewire\Transfers\TransferCreateComponent;
use Obelaw\Warehouse\Livewire\Transfers\TransferShowComponent;
use Obelaw\Warehouse\Livewire\Transfers\TransfersIndexComponent;
use Obelaw\Warehouse\Livewire\Warehouses\WarehouseCreateComponent;
use Obelaw\Warehouse\Livewire\Warehouses\WarehouseShowComponent;
use Obelaw\Warehouse\Livewire\Warehouses\WarehousesIndexComponent;
use Obelaw\Warehouse\Livewire\Warehouses\WarehouseUpdateComponent;

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

Route::prefix('warehouse')->group(function () {
    Route::get('/', HomeController::class)->name('obelaw.warehouse.home');

    Route::prefix('/warehouses')->group(function () {
        Route::get('/', WarehousesIndexComponent::class)->middleware('obelawPermission:warehouses_index')->name('obelaw.warehouse.warehouses.index');
        Route::get('/create', WarehouseCreateComponent::class)->name('obelaw.warehouse.warehouses.create');
        Route::get('/{warehouse}/update', WarehouseUpdateComponent::class)->name('obelaw.warehouse.warehouses.update');
        Route::get('/{warehouse}/show', WarehouseShowComponent::class)->name('obelaw.warehouse.warehouses.show');
    });
    
    Route::prefix('/inventories')->group(function () {
        Route::get('/', InventoriesIndexComponent::class)->name('obelaw.warehouse.inventories.index');
        Route::get('/create', InventoryCreateComponent::class)->name('obelaw.warehouse.inventories.create');
        Route::get('/{inventory}/update', InventoryUpdateComponent::class)->name('obelaw.warehouse.inventories.update');
        Route::get('/{inventory}/show', InventoryShowComponent::class)->name('obelaw.warehouse.inventories.show');
    });

    Route::prefix('/transfers')->group(function () {
        Route::get('/', TransfersIndexComponent::class)->name('obelaw.warehouse.transfer.index');
        Route::get('/create', TransferCreateComponent::class)->name('obelaw.warehouse.transfer.create');
        Route::get('/{transfer}/show', TransferShowComponent::class)->name('obelaw.warehouse.transfer.show');
    });

    Route::prefix('/adjustments')->group(function () {
        Route::get('/', AdjustmentsIndexComponent::class)->name('obelaw.warehouse.adjustments.index');
        Route::get('/create', AdjustmentsCreateComponent::class)->name('obelaw.warehouse.adjustments.create');
        Route::get('/{adjustment}/show', AdjustmentShowComponent::class)->name('obelaw.warehouse.adjustments.show');
    });

    Route::prefix('/serial-numbers')->group(function () {
        Route::get('/', SerialNumbersIndexComponent::class)->name('obelaw.warehouse.serial-numbers.index');
        Route::get('/{item}/detail', DetailSerialNumberComponent::class)->name('obelaw.warehouse.serial-numbers.detail');
    });
});
