<?php

namespace Obelaw\Purchasing\Providers;

use Livewire\Livewire;
use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Purchasing\Lib\Repositories\Eloquent\PurchaseOrderRepository;
use Obelaw\Purchasing\Lib\Repositories\PurchaseOrderRepositoryInterface;
use Obelaw\Purchasing\Lib\Services\PurchaseOrderService;
use Obelaw\Purchasing\Livewire\PurchaseOrders\CreatePurchaseOrderComponent;
use Obelaw\Purchasing\Livewire\PurchaseOrders\OpenPurchaseOrderComponent;
use Obelaw\Purchasing\Livewire\Vendors\CreateVendorComponent;
use Obelaw\Purchasing\Livewire\Vendors\IndexVendorsComponent;
use Obelaw\Purchasing\Livewire\Vendors\UpdateVendorComponent;
use Obelaw\Purchasing\Livewire\Vendors\Views\VendorInfoView;
use Obelaw\Purchasing\Livewire\Vendors\Views\VendorPaymentsView;

class ObelawPurchasingServiceProvider extends ServiceProviderBase
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PurchaseOrderRepositoryInterface::class, PurchaseOrderRepository::class);

        $this->app->singleton('obelaw.purchases.orders', PurchaseOrderService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-purchasing');

        Livewire::component('obelaw-purchasing-po-create', CreatePurchaseOrderComponent::class);
        Livewire::component('obelaw-purchasing-po-open', OpenPurchaseOrderComponent::class);
        
        Livewire::component('obelaw-purchasing-vendors-index', IndexVendorsComponent::class);
        Livewire::component('obelaw-purchasing-vendors-create', CreateVendorComponent::class);
        Livewire::component('obelaw-purchasing-vendors-open', UpdateVendorComponent::class);
        // Vendors Views
        Livewire::component('obelaw-purchasing-vendors-show-info', VendorInfoView::class);
        Livewire::component('obelaw-purchasing-vendors-show-payments', VendorPaymentsView::class);
    }
}
