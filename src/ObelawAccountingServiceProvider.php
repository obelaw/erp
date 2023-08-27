<?php

namespace Obelaw\Accounting;

use Livewire\Livewire;
use Obelaw\Accounting\Http\Livewire\COA\CreateComponent;
use Obelaw\Accounting\Http\Livewire\Entries\CreateEntryComponent;
use Obelaw\Accounting\Http\Livewire\Payments\CreatePaymentComponent;
use Obelaw\Accounting\Http\Livewire\Payments\IndexPaymentsComponent;
use Obelaw\Accounting\Http\Livewire\Payments\UpdatePaymentComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\CreatePriceListComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\ItemsPriceListComponent;
use Obelaw\Accounting\Http\Livewire\PriceList\UpdatePriceListComponent;
use Obelaw\Accounting\Http\Livewire\Vendors\CreateVendorComponent;
use Obelaw\Accounting\Http\Livewire\Vendors\IndexVendorsComponent;
use Obelaw\Accounting\Http\Livewire\Vendors\UpdateVendorComponent;
use Obelaw\Accounting\Lib\COA\AccountRules\AssetsRules;
use Obelaw\Accounting\Lib\COA\AccountType;
use Obelaw\Accounting\Livewire\COA\Views\AccountInfo;
use Obelaw\Accounting\Livewire\COA\Views\JournalEntries;
use Obelaw\Accounting\Livewire\PriceList\Views\AddItem;
use Obelaw\Accounting\Livewire\PriceList\Views\ShowItems;
use Obelaw\Accounting\Livewire\Vendors\Views\VendorChequesView;
use Obelaw\Accounting\Livewire\Vendors\Views\VendorInfoView;
use Obelaw\Accounting\Livewire\Vendors\Views\VendorPaymentsView;
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
        AccountType::addType('assets', 'Assets', AssetsRules::class);
        AccountType::addType('liabilities', 'Liabilities');
        AccountType::addType('equity', 'Equity');
        AccountType::addType('cash', 'Cash');
        AccountType::addType('bank', 'Bank');
        AccountType::addType('current_assets', 'Current Assets');
        AccountType::addType('current_liabilities', 'Current Liabilities');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('obelaw-accounting-coa-create', CreateComponent::class);
        // Views
        Livewire::component('obelaw-accounting-coa-show-account-info', AccountInfo::class);
        Livewire::component('obelaw-accounting-coa-show-journal-entrie', JournalEntries::class);


        Livewire::component('obelaw-accounting-entry-create', CreateEntryComponent::class);

        Livewire::component('obelaw-accounting-pricelist-create', CreatePriceListComponent::class);
        Livewire::component('obelaw-accounting-pricelist-update', UpdatePriceListComponent::class);
        Livewire::component('obelaw-accounting-pricelist-items', ItemsPriceListComponent::class);
        // Views
        Livewire::component('obelaw-accounting-pricelist-additem', AddItem::class);
        Livewire::component('obelaw-accounting-pricelist-showitems', ShowItems::class);

        Livewire::component('obelaw-accounting-vendors-index', IndexVendorsComponent::class);
        Livewire::component('obelaw-accounting-vendor-create', CreateVendorComponent::class);
        Livewire::component('obelaw-accounting-vendor-update', UpdateVendorComponent::class);
        Livewire::component('obelaw-accounting-vendor-show-info', VendorInfoView::class);
        Livewire::component('obelaw-accounting-vendor-show-payments', VendorPaymentsView::class);
        Livewire::component('obelaw-accounting-vendor-show-cheques', VendorChequesView::class);
        Livewire::component('obelaw-accounting-vendor-payments-index', IndexPaymentsComponent::class);
        Livewire::component('obelaw-accounting-vendor-payment-create', CreatePaymentComponent::class);
        Livewire::component('obelaw-accounting-vendor-payment-update', UpdatePaymentComponent::class);

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
