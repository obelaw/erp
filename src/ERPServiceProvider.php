<?php

namespace Obelaw\ERP;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Obelaw\Accounting\AccountingAddon;
use Obelaw\Audit\AuditAddon;
use Obelaw\Catalog\CatalogAddon;
use Obelaw\Contacts\ContactsAddon;
use Obelaw\Purchasing\PurchasingAddon;
use Obelaw\Sales\SalesAddon;
use Obelaw\Warehouse\WarehouseAddon;
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
        \Obelaw\Twist\Addons\AddonsPool::setPoolPath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'addons', \Obelaw\Twist\Addons\AddonsPool::LEVELONE);

        Str::macro('money', function ($value) {
            if (empty($value)) {
                return '';
            }

            return $value . 'EGP';

            // return format_money(money: $value, 'EGP');
        });

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw.erp');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('vendor/obelaw/assets'),
            ], groups: ['obelaw', 'obelaw:assets']);
        }
    }
}
