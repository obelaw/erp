<?php

namespace Obelaw\Purchasing\Providers;

use Livewire\Livewire;
use Obelaw\Framework\Base\ServiceProviderBase;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('obelaw-purchasing-vendors-index', IndexVendorsComponent::class);
        Livewire::component('obelaw-purchasing-vendors-create', CreateVendorComponent::class);
        Livewire::component('obelaw-purchasing-vendors-open', UpdateVendorComponent::class);
        // Vendors Views
        Livewire::component('obelaw-purchasing-vendors-show-info', VendorInfoView::class);
        Livewire::component('obelaw-purchasing-vendors-show-payments', VendorPaymentsView::class);
    }
}
