<?php

namespace Obelaw\ERP;

use Illuminate\Support\ServiceProvider;
use Obelaw\Catalog\Filament\ERPCatalogModule;
use Obelaw\Contacts\Filament\ERPContactModule;
use Obelaw\ERP\Addons\Audit\AuditAddon;
use Obelaw\ERP\ERPManagement;
use Obelaw\Render\BundlesPool;
use Obelaw\Sales\Filament\ERPSalesModule;
use Obelaw\Twist\Facades\Twist;
use Obelaw\Warehouse\Filament\ERPWarehouseModule;

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
            ERPWarehouseModule::make(),
            new ERPCatalogModule,
            new ERPContactModule,
            AuditAddon::make(),
            new ERPSalesModule,
        ]);

        BundlesPool::setPoolPath(__DIR__ . '/../addons/vendors');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/icons' => public_path('vendor/obelaw/icons'),
            ], ['obelaw:icons']);
        }
    }
}
