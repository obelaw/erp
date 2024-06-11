<?php

namespace Obelaw\ERP;

use Illuminate\Support\ServiceProvider;
use Obelaw\ERP\ERPManagement;
use Obelaw\Render\BundlesPool;

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
        BundlesPool::setPoolPath(__DIR__ . '/../addons/vendors');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/icons' => public_path('vendor/obelaw/icons'),
            ], ['obelaw:icons']);
        }
    }
}
