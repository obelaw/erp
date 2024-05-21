<?php

namespace Obelaw\Serialization\Providers;

use Obelaw\Framework\Base\ServiceProviderBase;

class ObelawSerializationServiceProvider extends ServiceProviderBase
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
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-serialization');
    }
}
