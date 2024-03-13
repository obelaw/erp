<?php

namespace Obelaw\Warehouse\Providers;

use Livewire\Livewire;
use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Warehouse\Facades\TransferType;
use Obelaw\Warehouse\Lib\Repositories\AdjustmentRepositoryInterface;
use Obelaw\Warehouse\Lib\Repositories\Eloquent\AdjustmentRepository;
use Obelaw\Warehouse\Lib\Repositories\Eloquent\InventoryRepository;
use Obelaw\Warehouse\Lib\Repositories\Eloquent\TransferRepository;
use Obelaw\Warehouse\Lib\Repositories\Eloquent\WarehouseRepository;
use Obelaw\Warehouse\Lib\Repositories\InventoryRepositoryInterface;
use Obelaw\Warehouse\Lib\Repositories\TransferRepositoryInterface;
use Obelaw\Warehouse\Lib\Repositories\WarehouseRepositoryInterface;
use Obelaw\Warehouse\Lib\Services\AdjustmentService;
use Obelaw\Warehouse\Lib\Services\AuditStockService;
use Obelaw\Warehouse\Lib\Services\TransferService;
use Obelaw\Warehouse\Livewire\Adjustments\CreateAdjustmentComponent;
use Obelaw\Warehouse\Livewire\Adjustments\IndexAdjustmentsComponent;
use Obelaw\Warehouse\Livewire\Adjustments\ShowAdjustmentComponent;
use Obelaw\Warehouse\Livewire\Inventories\CreateInventoryComponent;
use Obelaw\Warehouse\Livewire\Inventories\IndexInventoriesComponent;
use Obelaw\Warehouse\Livewire\Inventories\UpdateInventoryComponent;
use Obelaw\Warehouse\Livewire\Inventories\Views\InventoryInfoView;
use Obelaw\Warehouse\Livewire\Inventories\Views\InventoryProductsView;
use Obelaw\Warehouse\Livewire\Inventories\Views\InventorySerialNumbersView;
use Obelaw\Warehouse\Livewire\Products\Categories\CatagoryCreateComponent;
use Obelaw\Warehouse\Livewire\Products\Categories\CatagoryUpdateComponent;
use Obelaw\Warehouse\Livewire\Products\Categories\CategoriesIndexComponent;
use Obelaw\Warehouse\Livewire\Products\ProductCreateComponent;
use Obelaw\Warehouse\Livewire\Products\ProductsIndexComponent;
use Obelaw\Warehouse\Livewire\Products\ProductUpdateComponent;
use Obelaw\Warehouse\Livewire\SerialNumbers\SerialNumbersIndexComponent;
use Obelaw\Warehouse\Livewire\Transfers\CreateTransferComponent;
use Obelaw\Warehouse\Livewire\Transfers\CreateTransferSerialsComponent;
use Obelaw\Warehouse\Livewire\Transfers\IndexTransfersComponent;
use Obelaw\Warehouse\Livewire\Transfers\ManageTransferComponent;
use Obelaw\Warehouse\Livewire\Transfers\Views\TransfersBundles;
use Obelaw\Warehouse\Livewire\Transfers\Views\TransfersInfoView;
use Obelaw\Warehouse\Livewire\Transfers\Views\TransfersItems;
use Obelaw\Warehouse\Livewire\Warehouses\CreateWarehouseComponent;
use Obelaw\Warehouse\Livewire\Warehouses\IndexWarehousesComponent;
use Obelaw\Warehouse\Livewire\Warehouses\UpdateWarehouseComponent;
use Obelaw\Warehouse\Livewire\Warehouses\Views\InventoriesListView;
use Obelaw\Warehouse\Livewire\Warehouses\Views\WarehouseInfoView;
use Obelaw\Warehouse\Utils\TransferTypeManagement;

class ObelawWarehouseServiceProvider extends ServiceProviderBase
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WarehouseRepositoryInterface::class, WarehouseRepository::class);
        $this->app->bind(InventoryRepositoryInterface::class, InventoryRepository::class);
        $this->app->bind(AdjustmentRepositoryInterface::class, AdjustmentRepository::class);
        $this->app->bind(TransferRepositoryInterface::class, TransferRepository::class);

        $this->app->singleton('obelaw.warehouse.transfertypemanagement', TransferTypeManagement::class);
        $this->app->singleton('obelaw.warehouse.adjustment', AdjustmentService::class);
        $this->app->singleton('obelaw.warehouse.transfer', TransferService::class);
        $this->app->singleton('obelaw.warehouse.auditstock', AuditStockService::class);
    }
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-warehouse');

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'obelaw-warehouse');

        TransferType::addType(\Obelaw\Warehouse\Models\Adjustment::class, 'Adjustment');

        Livewire::component('obelaw-warehouses-warehouses-index', IndexWarehousesComponent::class);
        Livewire::component('obelaw-warehouses-warehouses-create', CreateWarehouseComponent::class);
        Livewire::component('obelaw-warehouses-warehouses-update', UpdateWarehouseComponent::class);
        Livewire::component('obelaw-warehouses-warehouses-view-warehouse-info', WarehouseInfoView::class);
        Livewire::component('obelaw-warehouses-warehouses-view-inventories-list', InventoriesListView::class);

        Livewire::component('obelaw-warehouses-inventories-index', IndexInventoriesComponent::class);
        Livewire::component('obelaw-warehouses-inventories-create', CreateInventoryComponent::class);
        Livewire::component('obelaw-warehouses-inventories-update', UpdateInventoryComponent::class);
        Livewire::component('obelaw-warehouses-inventories-view-inventory-info', InventoryInfoView::class);
        Livewire::component('obelaw-warehouses-inventories-view-inventory-products', InventoryProductsView::class);
        Livewire::component('obelaw-warehouses-inventories-view-inventory-serialnumbers', InventorySerialNumbersView::class);

        Livewire::component('obelaw-warehouses-transfers-index', IndexTransfersComponent::class);
        Livewire::component('obelaw-warehouses-transfers-update', CreateTransferComponent::class);
        Livewire::component('obelaw-warehouses-transfers-manage', ManageTransferComponent::class);
        Livewire::component('obelaw-warehouses-transfers-serials', CreateTransferSerialsComponent::class);
        Livewire::component('obelaw-warehouses-transfers-view-transfer-info', TransfersInfoView::class);
        Livewire::component('obelaw-warehouses-transfers-view-transfer-items', TransfersItems::class);
        Livewire::component('obelaw-warehouses-transfers-view-transfer-bundles', TransfersBundles::class);
        
        Livewire::component('obelaw-warehouses-adjustments-index', IndexAdjustmentsComponent::class);
        Livewire::component('obelaw-warehouses-adjustments-create', CreateAdjustmentComponent::class);
        Livewire::component('obelaw-warehouses-adjustments-show', ShowAdjustmentComponent::class);

        Livewire::component('obelaw-warehouses-products-categories-index', CategoriesIndexComponent::class);
        Livewire::component('obelaw-warehouses-products-categories-create', CatagoryCreateComponent::class);
        Livewire::component('obelaw-warehouses-products-categories-update', CatagoryUpdateComponent::class);

        Livewire::component('obelaw-warehouses-products-index', ProductsIndexComponent::class);
        Livewire::component('obelaw-warehouses-products-create', ProductCreateComponent::class);
        Livewire::component('obelaw-warehouses-products-update', ProductUpdateComponent::class);

        Livewire::component('obelaw-warehouses-serialnumbers-index', SerialNumbersIndexComponent::class);
    }
}
