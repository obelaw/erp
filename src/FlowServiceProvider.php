<?php

namespace Obelaw\Flow;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Obelaw\Contacts\ContactType;
use Obelaw\Warehouse\Services\WarehouseService;

class FlowServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        ContactType::add('CUSTOMER', 1);
        ContactType::add('VENDOR', 2);

        $this->mergeConfigFrom(
            __DIR__ . '/../config/flow.php',
            'obelaw.flow'
        );

        $this->app->bind('obelaw.flow.warehouse.management', WarehouseService::class);
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

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw.flow');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('vendor/obelaw/assets'),
            ], groups: ['obelaw', 'obelaw:assets']);

            $this->publishes([
                __DIR__ . '/../config/erp.php' => config_path('obelaw/erp.php'),
            ]);
        }
    }
}
