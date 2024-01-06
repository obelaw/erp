<?php

namespace Obelaw\Catalog\Providers;

use Livewire\Livewire;
use Obelaw\Catalog\Livewire\Categories\CatagoryCreateComponent;
use Obelaw\Catalog\Livewire\Products\ProductCreateComponent;
use Obelaw\Catalog\Livewire\Products\ProductsIndexComponent;
use Obelaw\Catalog\Livewire\Products\ProductUpdateComponent;
use Obelaw\Catalog\Livewire\Variants\CreateVariantComponent;
use Obelaw\Catalog\Livewire\Variants\IndexVariantsComponent;
use Obelaw\Catalog\Livewire\Variants\UpdateVariantComponent;
use Obelaw\Catalog\Livewire\Widgets\CountProductsWidget;
use Obelaw\Framework\Base\ServiceProviderBase;

class ObelawCatalogServiceProvider extends ServiceProviderBase
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
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-catalog');

        // Widgets Components
        Livewire::component('obelaw-catalog-widgets-count-products-widget', CountProductsWidget::class);

        Livewire::component('obelaw-catalog-catagory-index', CatagoryCreateComponent::class);

        Livewire::component('obelaw-catalog-product-index', ProductsIndexComponent::class);
        Livewire::component('obelaw-catalog-product-create', ProductCreateComponent::class);
        Livewire::component('obelaw-catalog-product-update', ProductUpdateComponent::class);

        Livewire::component('obelaw-catalog-variants-index', IndexVariantsComponent::class);
        Livewire::component('obelaw-catalog-variants-create', CreateVariantComponent::class);
        Livewire::component('obelaw-catalog-variants-update', UpdateVariantComponent::class);
    }
}
