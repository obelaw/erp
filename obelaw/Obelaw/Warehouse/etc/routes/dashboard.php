<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Warehouse\Http\Controllers\HomeController;
use Obelaw\Warehouse\Livewire\Adjustments\AdjustmentsCreateComponent;
use Obelaw\Warehouse\Livewire\Adjustments\AdjustmentShowComponent;
use Obelaw\Warehouse\Livewire\Adjustments\AdjustmentsIndexComponent;
use Obelaw\Warehouse\Livewire\Adjustments\CreateAdjustmentComponent;
use Obelaw\Warehouse\Livewire\Adjustments\IndexAdjustmentsComponent;
use Obelaw\Warehouse\Livewire\Adjustments\ShowAdjustmentComponent;
use Obelaw\Warehouse\Livewire\Inventories\CreateInventoryComponent;
use Obelaw\Warehouse\Livewire\Inventories\IndexInventoriesComponent;
use Obelaw\Warehouse\Livewire\Inventories\InventoriesIndexComponent;
use Obelaw\Warehouse\Livewire\Inventories\InventoryCreateComponent;
use Obelaw\Warehouse\Livewire\Inventories\InventoryShowComponent;
use Obelaw\Warehouse\Livewire\Inventories\InventoryUpdateComponent;
use Obelaw\Warehouse\Livewire\Inventories\ShowInventoryComponent;
use Obelaw\Warehouse\Livewire\Inventories\UpdateInventoryComponent;
use Obelaw\Warehouse\Livewire\SerialNumbers\DetailSerialNumberComponent;
use Obelaw\Warehouse\Livewire\SerialNumbers\IndexSerialNumbersComponent;
use Obelaw\Warehouse\Livewire\SerialNumbers\SerialNumbersIndexComponent;
use Obelaw\Warehouse\Livewire\Transfers\CreateTransferComponent;
use Obelaw\Warehouse\Livewire\Transfers\IndexTransfersComponent;
use Obelaw\Warehouse\Livewire\Transfers\ShowTransferComponent;
use Obelaw\Warehouse\Livewire\Transfers\TransferCreateComponent;
use Obelaw\Warehouse\Livewire\Transfers\TransferShowComponent;
use Obelaw\Warehouse\Livewire\Transfers\TransfersIndexComponent;
use Obelaw\Warehouse\Livewire\Warehouses\CreateWarehouseComponent;
use Obelaw\Warehouse\Livewire\Warehouses\IndexWarehousesComponent;
use Obelaw\Warehouse\Livewire\Warehouses\ShowWarehouseComponent;
use Obelaw\Warehouse\Livewire\Warehouses\UpdateWarehouseComponent;

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
        Route::get('/', IndexWarehousesComponent::class)->name('obelaw.warehouse.warehouses.index');
        Route::get('/create', CreateWarehouseComponent::class)->name('obelaw.warehouse.warehouses.create');
        Route::get('/{warehouse}/update', UpdateWarehouseComponent::class)->name('obelaw.warehouse.warehouses.update');
        Route::get('/{warehouse}/show', ShowWarehouseComponent::class)->name('obelaw.warehouse.warehouses.show');
    });

    Route::prefix('/inventories')->group(function () {
        Route::get('/', IndexInventoriesComponent::class)->name('obelaw.warehouse.inventories.index');
        Route::get('/create', CreateInventoryComponent::class)->name('obelaw.warehouse.inventories.create');
        Route::get('/{inventory}/update', UpdateInventoryComponent::class)->name('obelaw.warehouse.inventories.update');
        Route::get('/{inventory}/show', ShowInventoryComponent::class)->name('obelaw.warehouse.inventories.show');
    });

    Route::prefix('/transfers')->group(function () {
        Route::get('/', IndexTransfersComponent::class)->name('obelaw.warehouse.transfer.index');
        Route::get('/create', CreateTransferComponent::class)->name('obelaw.warehouse.transfer.create');
        Route::get('/{transfer}/show', ShowTransferComponent::class)->name('obelaw.warehouse.transfer.show');
    });

    Route::prefix('/adjustments')->group(function () {
        Route::get('/', IndexAdjustmentsComponent::class)->name('obelaw.warehouse.adjustments.index');
        Route::get('/create', CreateAdjustmentComponent::class)->name('obelaw.warehouse.adjustments.create');
        Route::get('/{adjustment}/show', ShowAdjustmentComponent::class)->name('obelaw.warehouse.adjustments.show');
    });

    Route::prefix('/serial-numbers')->group(function () {
        Route::get('/', IndexSerialNumbersComponent::class)->name('obelaw.warehouse.serial-numbers.index');
        Route::get('/{item}/detail', DetailSerialNumberComponent::class)->name('obelaw.warehouse.serial-numbers.detail');
    });
});
