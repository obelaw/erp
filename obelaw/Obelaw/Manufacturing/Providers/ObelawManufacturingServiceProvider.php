<?php

namespace Obelaw\Manufacturing\Providers;

use Livewire\Livewire;
use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Manufacturing\Livewire\Orders\CreateOrderComponent;
use obelaw\manufacturing\livewire\orders\DetailOrderComponent;
use Obelaw\Manufacturing\Livewire\Orders\IndexOrdersComponent;
use Obelaw\Manufacturing\Livewire\Planning\CreatePlanComponent;
use Obelaw\Manufacturing\Livewire\Planning\IndexPlansComponent;
use Obelaw\Manufacturing\Livewire\Planning\UpdatePlanComponent;
use Obelaw\Manufacturing\Livewire\Products\IndexProductsComponent;
use Obelaw\Manufacturing\Livewire\Products\ProductVariantsComponent;
use Obelaw\Manufacturing\Livewire\Workers\CreateWorkerComponent;
use Obelaw\Manufacturing\Livewire\Workers\IndexWorkersComponent;
use Obelaw\Manufacturing\Livewire\Workers\UpdateWorkerComponent;
use Obelaw\Manufacturing\Services\ManufacturingProductService;
use Obelaw\Manufacturing\Services\PlanService;
use Obelaw\Manufacturing\Views\Layout;
use Obelaw\Warehouse\Facades\TransferType;

class ObelawManufacturingServiceProvider extends ServiceProviderBase
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('manufacturing.service.product', ManufacturingProductService::class);

        $this->app->singleton('manufacturing.services.plan', PlanService::class);

        // dd(114);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        TransferType::addType(\Obelaw\Manufacturing\Models\Manufactured::class, 'Manufactured');

        Livewire::component('obelaw-manufacturing-products-index', IndexProductsComponent::class);

        Livewire::component('obelaw-manufacturing-products-variants-create', ProductVariantsComponent::class);

        Livewire::component('obelaw-manufacturing-orders-index', IndexOrdersComponent::class);
        Livewire::component('obelaw-manufacturing-orders-create', CreateOrderComponent::class);
        Livewire::component('obelaw-manufacturing-orders-detail', DetailOrderComponent::class);

        Livewire::component('obelaw-manufacturing-planning-index', IndexPlansComponent::class);
        Livewire::component('obelaw-manufacturing-planning-create', CreatePlanComponent::class);
        Livewire::component('obelaw-manufacturing-planning-update', UpdatePlanComponent::class);

        Livewire::component('obelaw-manufacturing-workers-index', IndexWorkersComponent::class);
        Livewire::component('obelaw-manufacturing-workers-create', CreateWorkerComponent::class);
        Livewire::component('obelaw-manufacturing-workers-update', UpdateWorkerComponent::class);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-manufacturing');

        $this->loadViewComponentsAs('obelaw-manufacturing', $this->viewComponents());
    }

    private function viewComponents(): array
    {
        return [
            Layout::class,
        ];
    }
}
