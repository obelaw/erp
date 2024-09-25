<?php

namespace Obelaw\ERP;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Obelaw\ERP\Addons\Accounting\AccountingAddon;
use Obelaw\ERP\Addons\Audit\AuditAddon;
use Obelaw\ERP\Addons\Catalog\CatalogAddon;
use Obelaw\ERP\Addons\Contacts\ContactsAddon;
use Obelaw\ERP\Addons\Purchasing\PurchasingAddon;
use Obelaw\ERP\Addons\Sales\SalesAddon;
use Obelaw\ERP\Addons\Warehouse\WarehouseAddon;
use Obelaw\ERP\ERPManagement;
use Obelaw\Twist\Facades\Twist;

use function Filament\Support\format_money;

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
            SalesAddon::make(),
            WarehouseAddon::make(),
            CatalogAddon::make(),
            ContactsAddon::make(),
            AuditAddon::make(),
            AuditAddon::make(),
            PurchasingAddon::make(),
        ]);

        Str::macro('money', function ($value) {
            if (empty($value)) {
                return '';
            }

            return format_money(money: $value, 'EGP');
        });

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw.erp');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('vendor/obelaw/assets'),
            ], groups: ['obelaw', 'obelaw:assets']);
        }
    }
}
