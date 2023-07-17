<?php

namespace Obelaw\NameModule;

use Illuminate\Support\ServiceProvider;
use Obelaw\NameModule\Views\Layout;
use Obelaw\Framework\Console\SetupCommand;

class ObelawNameModuleServiceProvider extends ServiceProvider
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
        //
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-namemodule');

        $this->loadViewComponentsAs('obelaw-namemodule', $this->viewComponents());

        if ($this->app->runningInConsole()) {

            $this->commands([
                SetupCommand::class,
            ]);

            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
    }

    private function viewComponents(): array
    {
        return [
            Layout::class,
        ];
    }
}
