<?php

namespace Obelaw\Accounting;

use Obelaw\Accounting\Http\Controllers\COA\CreateComponent;
use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Accounting\Views\Layout;
use Obelaw\Framework\Console\SetupCommand;
use Livewire\Livewire;

class ObelawAccountingServiceProvider extends ServiceProviderBase
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
        Livewire::component('obelaw-accounting-coa-create', CreateComponent::class);
        //
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-accounting');

        $this->loadViewComponentsAs('obelaw-accounting', $this->viewComponents());

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
