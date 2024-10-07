<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Clusters\SalesSettings\Pages;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Obelaw\ERP\Addons\Sales\Filament\Clusters\SalesSettings;
use Obelaw\ERP\Addons\Sales\Models\OrderStatus;
use Obelaw\Permit\Attributes\PagePermission;
use Obelaw\Twist\Contracts\iSettings;
use Obelaw\Twist\Support\BaseSettingsPage;

#[PagePermission(
    id: 'permit.sales.orders_settings',
    title: 'Orders Settings',
    description: 'Ability to modify all orders settings',
    category: 'Sales Settings'
)]
class OrdersSettings extends BaseSettingsPage implements iSettings
{
    protected static ?string $cluster = SalesSettings::class;
    protected static ?string $title = 'Orders Settings';
    protected ?string $heading = 'Orders Settings';
    protected ?string $subheading = 'Ability to modify all orders settings';
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public $sales_default_order_status;
    public $sales_delivery_order_status;

    protected function getFormSchema(): array
    {
        return [
            Section::make('Select Status')
                ->description(description: 'You can choose the status in which you want the order to be created')
                ->schema([
                    Select::make('sales_default_order_status')
                        ->label('Status')
                        ->options(OrderStatus::query()->pluck('name', 'id'))
                        ->required(),
                ]),

            Section::make('Select Status for delivery order')
                ->description('You can choose the status in which you want the delivery order to be created')
                ->schema([
                    Select::make('sales_delivery_order_status')
                        ->label('Status')
                        ->options(OrderStatus::query()->pluck('name', 'id'))
                        ->required(),
                ]),
        ];
    }

    public function mount(): void
    {
        $this->form->fill([
            'sales_default_order_status' => o_config()->get('sales_default_order_status'), // what should I fill here? I sent in an array, and exception says string expected
            'sales_delivery_order_status' => o_config()->get('sales_delivery_order_status'), // what should I fill here? I sent in an array, and exception says string expected
        ]);
    }

    public function save($inputs)
    {
        o_config()->set('sales_default_order_status', $inputs['sales_default_order_status']);
        o_config()->set('sales_delivery_order_status', $inputs['sales_delivery_order_status']);

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }
}
