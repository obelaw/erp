<?php

namespace Obelaw\Accounting\Providers;

use Livewire\Livewire;
use Obelaw\Accounting\Lib\COA\AccountRules\AssetsRules;
use Obelaw\Accounting\Lib\COA\AccountType;
use Obelaw\Accounting\Lib\Services\AccountService;
use Obelaw\Accounting\Lib\Services\EntryService;
use Obelaw\Accounting\Lib\Services\PriceListService;
use Obelaw\Accounting\Livewire\COA\CreateComponent;
use Obelaw\Accounting\Livewire\COA\Views\AccountInfo;
use Obelaw\Accounting\Livewire\COA\Views\JournalEntries;
use Obelaw\Accounting\Livewire\Configurations\PaymentMethods\CreatePaymentMethodsComponent;
use Obelaw\Accounting\Livewire\Configurations\PaymentMethods\IndexPaymentMethodsComponent;
use Obelaw\Accounting\Livewire\Configurations\PaymentMethods\UpdatePaymentMethodsComponent;
use Obelaw\Accounting\Livewire\Entries\CreateEntryComponent;
use Obelaw\Accounting\Livewire\Entries\EntryInfoView;
use Obelaw\Accounting\Livewire\Payments\CreatePaymentComponent;
use Obelaw\Accounting\Livewire\Payments\IndexPaymentsComponent;
use Obelaw\Accounting\Livewire\Payments\UpdatePaymentComponent;
use Obelaw\Accounting\Livewire\PriceList\CreatePriceListComponent;
use Obelaw\Accounting\Livewire\PriceList\ItemsPriceListComponent;
use Obelaw\Accounting\Livewire\PriceList\UpdatePriceListComponent;
use Obelaw\Accounting\Livewire\PriceList\Views\AddItem;
use Obelaw\Accounting\Livewire\PriceList\Views\ShowItems;
use Obelaw\Accounting\Livewire\Vendors\CreateVendorComponent;
use Obelaw\Accounting\Livewire\Vendors\IndexVendorsComponent;
use Obelaw\Accounting\Livewire\Vendors\UpdateVendorComponent;
use Obelaw\Accounting\Livewire\Vendors\Views\VendorChequesView;
use Obelaw\Accounting\Livewire\Vendors\Views\VendorInfoView;
use Obelaw\Accounting\Livewire\Vendors\Views\VendorPaymentsView;
use Obelaw\Accounting\Livewire\Widgets\CountAOCWidget;
use Obelaw\Accounting\Livewire\Widgets\CountPriceListWidget;
use Obelaw\Accounting\Livewire\Widgets\ProfitWidget;
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
        AccountType::addType('fixed_assets', 'Fixed Assets');
        AccountType::addType('current_assets', 'Current Assets');
        AccountType::addType('current_liabilities', 'Current Liabilities');
        AccountType::addType('accounts_payable', 'Accounts Payable');
        AccountType::addType('accounts_receivable', 'Accounts Receivable');

        $this->app->singleton('obelaw.accounting.account', AccountService::class);
        $this->app->singleton('obelaw.accounting.entry', EntryService::class);
        $this->app->singleton('obelaw.accounting.price-list', PriceListService::class);
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
        Livewire::component('obelaw-accounting-entry-show-info', EntryInfoView::class);

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

        Livewire::component('obelaw-accounting-count-aoc-widget', CountAOCWidget::class);
        Livewire::component('obelaw-accounting-profit-widget', ProfitWidget::class);
        Livewire::component('obelaw-accounting-count-price-list-widget', CountPriceListWidget::class);

        Livewire::component('obelaw-accounting-configurations-paymentmethods-index', IndexPaymentMethodsComponent::class);
        Livewire::component('obelaw-accounting-configurations-paymentmethods-create', CreatePaymentMethodsComponent::class);
        Livewire::component('obelaw-accounting-configurations-paymentmethods-update', UpdatePaymentMethodsComponent::class);

        //
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-accounting');

        if ($this->app->runningInConsole()) {

            $this->commands([
                SetupCommand::class,
            ]);
        }
    }
}
