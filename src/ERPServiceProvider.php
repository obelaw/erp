<?php

namespace Obelaw\ERP;

use Illuminate\Support\ServiceProvider;
use Obelaw\Contacts\Filament\ERPContactModule;
use Obelaw\ERP\Addons\Audit\AuditAddon;
use Obelaw\ERP\Addons\Catalog\CatalogAddon;
use Obelaw\ERP\Addons\Purchasing\PurchasingAddon;
use Obelaw\ERP\Addons\Warehouse\WarehouseAddon;
use Obelaw\ERP\ERPManagement;
use Obelaw\Render\BundlesPool;
use Obelaw\Sales\Filament\ERPSalesModule;
use Obelaw\Twist\Facades\Twist;

class ERPServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('obelaw.erp.management', ERPManagement::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Twist::setModules([
            WarehouseAddon::make(),
            CatalogAddon::make(),
            new ERPContactModule,
            AuditAddon::make(),
            new ERPSalesModule,
            PurchasingAddon::make(),
        ]);

        BundlesPool::setPoolPath(__DIR__ . '/../addons/vendors');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/icons' => public_path('vendor/obelaw/icons'),
            ], ['obelaw:icons']);
        }
    }
}
