<?php

namespace Obelaw\Catalog\Providers;

use Livewire\Livewire;
use Obelaw\Catalog\Lib\Repositories\Eloquent\ProductRepository;
use Obelaw\Catalog\Lib\Repositories\ProductRepositoryInterface;
use Obelaw\Catalog\Lib\Services\ProductService;
use Obelaw\Catalog\Livewire\Categories\CreateCatagoryComponent;
use Obelaw\Catalog\Livewire\Categories\IndexCategoriesComponent;
use Obelaw\Catalog\Livewire\Categories\UpdateCatagoryComponent;
use Obelaw\Catalog\Livewire\Products\CreateProductComponent;
use Obelaw\Catalog\Livewire\Products\IndexProductsComponent;
use Obelaw\Catalog\Livewire\Products\UpdateProductComponent;
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
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

        $this->app->singleton('obelaw.catalog.products', ProductService::class);
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

        Livewire::component('obelaw-catalog-catagory-index', IndexCategoriesComponent::class);
        Livewire::component('obelaw-catalog-catagory-create', CreateCatagoryComponent::class);
        Livewire::component('obelaw-catalog-catagory-update', UpdateCatagoryComponent::class);

        Livewire::component('obelaw-catalog-product-index', IndexProductsComponent::class);
        Livewire::component('obelaw-catalog-product-create', CreateProductComponent::class);
        Livewire::component('obelaw-catalog-product-update', UpdateProductComponent::class);

        Livewire::component('obelaw-catalog-variants-index', IndexVariantsComponent::class);
        Livewire::component('obelaw-catalog-variants-create', CreateVariantComponent::class);
        Livewire::component('obelaw-catalog-variants-update', UpdateVariantComponent::class);
    }
}
