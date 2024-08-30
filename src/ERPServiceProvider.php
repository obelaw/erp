<?php

namespace Obelaw\ERP;

use Illuminate\Support\ServiceProvider;
use Obelaw\ERP\Addons\Accounting\AccountingAddon;
use Obelaw\ERP\Addons\Audit\AuditAddon;
use Obelaw\ERP\Addons\Catalog\CatalogAddon;
use Obelaw\ERP\Addons\Contacts\ContactsAddon;
use Obelaw\ERP\Addons\Purchasing\PurchasingAddon;
use Obelaw\ERP\Addons\Warehouse\WarehouseAddon;
use Obelaw\ERP\ERPManagement;
use Obelaw\Render\BundlesPool;
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
        Twist::appendAddons([
            AccountingAddon::make(),
            WarehouseAddon::make(),
            CatalogAddon::make(),
            ContactsAddon::make(),
            AuditAddon::make(),
            AuditAddon::make(),
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
