<?php

namespace Obelaw\Serialization\Providers;

use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Serialization\Views\Layout;

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
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-serialization');

        $this->loadViewComponentsAs('obelaw-serialization', $this->viewComponents());
    }

    private function viewComponents(): array
    {
        return [
            Layout::class,
        ];
    }
}
