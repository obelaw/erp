<?php

namespace Obelaw\Accounting;

use Livewire\Livewire;
use Obelaw\Accounting\Http\Livewire\COA\CreateComponent;
use Obelaw\Accounting\Http\Livewire\Entries\CreateEntryComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\CreatePriceListComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\ItemsPriceListComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\UpdatePriceListComponent;
use Obelaw\Accounting\Livewire\PriceList\Views\AddItem;
use Obelaw\Accounting\Livewire\PriceList\Views\ShowItems;
use Obelaw\Accounting\Views\Layout;
use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Framework\Console\SetupCommand;

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
        Livewire::component('obelaw-accounting-entry-create', CreateEntryComponent::class);

        Livewire::component('obelaw-accounting-pricelist-create', CreatePriceListComponent::class);
        Livewire::component('obelaw-accounting-pricelist-update', UpdatePriceListComponent::class);
        Livewire::component('obelaw-accounting-pricelist-items', ItemsPriceListComponent::class);
        // Views
        Livewire::component('obelaw-accounting-pricelist-additem', AddItem::class);
        Livewire::component('obelaw-accounting-pricelist-showitems', ShowItems::class);

        //
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
