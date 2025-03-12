<?php

namespace Obelaw\Sales\Filament\Pages\Settings;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Obelaw\Accounting\Models\Account;
use Obelaw\Sales\Filament\Clusters\SalesCluster;
use Obelaw\Permit\Attributes\PagePermission;
use Obelaw\Twist\Contracts\iSettings;
use Obelaw\Twist\Support\BaseSettingsPage;

#[PagePermission(
    id: 'permit.sales.orders_settings',
    title: 'Orders Settings',
    description: 'Ability to modify all orders settings',
    category: 'Sales Settings'
)]
class SalesInvoiceSettings extends BaseSettingsPage implements iSettings
{
    protected static ?string $cluster = SalesCluster::class;
    protected static ?string $title = 'Sales Invoice Settings';
    protected ?string $heading = 'Sales Invoice Settings';
    protected ?string $subheading = 'Ability to modify all sales invoice settings';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationIcon = 'heroicon-o-document-currency-pound';

    public $invoice_default_account_receivable;
    public $invoice_default_account_payable;
    public $invoice_default_account_product_sales;

    protected function getFormSchema(): array
    {
        return [
            Section::make('Select Status')
                ->description(description: 'You can choose the status in which you want the order to be created')
                ->schema([
                    Select::make('invoice_default_account_receivable')
                        ->label('Default Account Receivable')
                        ->options(Account::pluck('name', 'id'))
                        ->searchable()
                        ->required(),

                    Select::make('invoice_default_account_payable')
                        ->label('Default Account Payable')
                        ->options(Account::pluck('name', 'id'))
                        ->searchable()
                        ->required(),

                    Select::make('invoice_default_account_product_sales')
                        ->label('Default Account Product Sales')
                        ->options(Account::pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                ]),
        ];
    }

    public function mount(): void
    {
        $this->form->fill([
            'invoice_default_account_receivable' => o_config()->get('invoice_default_account_receivable'), // what should I fill here? I sent in an array, and exception says string expected
            'invoice_default_account_payable' => o_config()->get('invoice_default_account_payable'), // what should I fill here? I sent in an array, and exception says string expected
            'invoice_default_account_product_sales' => o_config()->get('invoice_default_account_product_sales'), // what should I fill here? I sent in an array, and exception says string expected
        ]);
    }

    public function save($inputs)
    {
        o_config()->set('invoice_default_account_receivable', $inputs['invoice_default_account_receivable']);
        o_config()->set('invoice_default_account_payable', $inputs['invoice_default_account_payable']);
        o_config()->set('invoice_default_account_product_sales', $inputs['invoice_default_account_product_sales']);

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }
}
