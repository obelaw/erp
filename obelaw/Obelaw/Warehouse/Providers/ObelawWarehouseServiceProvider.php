<?php

namespace Obelaw\Warehouse\Providers;

use Livewire\Livewire;
use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Framework\Console\SetupCommand;
use Obelaw\Warehouse\Facades\TransferType;
use Obelaw\Warehouse\Livewire\Adjustments\AdjustmentsCreateComponent;
use Obelaw\Warehouse\Livewire\Inventories\InventoriesIndexComponent;
use Obelaw\Warehouse\Livewire\Inventories\InventoryCreateComponent;
use Obelaw\Warehouse\Livewire\Inventories\InventoryUpdateComponent;
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
use Obelaw\Warehouse\Livewire\Transfers\TransferCreateComponent;
use Obelaw\Warehouse\Livewire\Transfers\TransfersIndexComponent;
use Obelaw\Warehouse\Livewire\Warehouses\Views\InventoriesListView;
use Obelaw\Warehouse\Livewire\Warehouses\Views\WarehouseInfoView;
use Obelaw\Warehouse\Livewire\Warehouses\WarehouseCreateComponent;
use Obelaw\Warehouse\Livewire\Warehouses\WarehousesIndexComponent;
use Obelaw\Warehouse\Livewire\Warehouses\WarehouseUpdateComponent;
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
        $this->app->singleton('obelaw.warehouse.transfertypemanagement', TransferTypeManagement::class);
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

        if ($this->app->runningInConsole()) {

            $this->commands([
                SetupCommand::class,
            ]);
        }

        TransferType::addType(\Obelaw\Warehouse\Models\Adjustment::class, 'Adjustment');

        Livewire::component('obelaw-warehouses-warehouses-index', WarehousesIndexComponent::class);
        Livewire::component('obelaw-warehouses-warehouses-create', WarehouseCreateComponent::class);
        Livewire::component('obelaw-warehouses-warehouses-update', WarehouseUpdateComponent::class);
        Livewire::component('obelaw-warehouses-warehouses-view-warehouse-info', WarehouseInfoView::class);
        Livewire::component('obelaw-warehouses-warehouses-view-inventories-list', InventoriesListView::class);

        Livewire::component('obelaw-warehouses-inventories-index', InventoriesIndexComponent::class);
        Livewire::component('obelaw-warehouses-inventories-create', InventoryCreateComponent::class);
        Livewire::component('obelaw-warehouses-inventories-update', InventoryUpdateComponent::class);
        Livewire::component('obelaw-warehouses-inventories-view-inventory-info', InventoryInfoView::class);
        Livewire::component('obelaw-warehouses-inventories-view-inventory-products', InventoryProductsView::class);
        Livewire::component('obelaw-warehouses-inventories-view-inventory-serialnumbers', InventorySerialNumbersView::class);

        Livewire::component('obelaw-warehouses-transfers-index', TransfersIndexComponent::class);
        Livewire::component('obelaw-warehouses-transfers-update', TransferCreateComponent::class);

        Livewire::component('obelaw-warehouses-adjustments-update', AdjustmentsCreateComponent::class);

        Livewire::component('obelaw-warehouses-products-categories-index', CategoriesIndexComponent::class);
        Livewire::component('obelaw-warehouses-products-categories-create', CatagoryCreateComponent::class);
        Livewire::component('obelaw-warehouses-products-categories-update', CatagoryUpdateComponent::class);

        Livewire::component('obelaw-warehouses-products-index', ProductsIndexComponent::class);
        Livewire::component('obelaw-warehouses-products-create', ProductCreateComponent::class);
        Livewire::component('obelaw-warehouses-products-update', ProductUpdateComponent::class);

        Livewire::component('obelaw-warehouses-serialnumbers-index', SerialNumbersIndexComponent::class);
    }
}
