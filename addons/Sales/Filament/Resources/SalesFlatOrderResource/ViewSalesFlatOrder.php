<?php

namespace Obelaw\Sales\Filament\Resources\SalesFlatOrderResource;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;
use Obelaw\Sales\Filament\Resources\SalesFlatOrderResource;
use Obelaw\Sales\Models\OrderCancelReason;
use Obelaw\Sales\Models\OrderStatus;
use Obelaw\Sales\Models\SalesFlatOrder;
use Obelaw\Shipping\Models\DeliveryOrder;

class ViewSalesFlatOrder extends ViewRecord
{
    protected static string $resource = SalesFlatOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('CreateDO')
                ->label('Create Delivery Order')
                ->fillForm(fn(SalesFlatOrder $record): array => [
                    'cod' => $record->grand_total,
                ])
                ->disabled(fn(SalesFlatOrder $record) => $record->isCancel() || $record->status_id != oconfig()->get('sales_delivery_order_status'))
                ->form([
                    TextInput::make('cod')
                        ->label('COD')
                        ->required(),
                ])
                ->action(function (array $data, SalesFlatOrder $record): void {
                    $do = DeliveryOrder::create([
                        'order_id' => $record->id,
                        'cod_amount' => $data['cod'],
                    ]);

                    foreach ($record->items as $item) {
                        $do->items()->create([
                            'item_id' => $item->id,
                        ]);
                    }
                }),

            Action::make('updateStatus')
                ->disabled(fn(SalesFlatOrder $record) => $record->isCancel())
                ->fillForm(fn(SalesFlatOrder $record): array => [
                    'status_id' => $record->status_id,
                ])
                ->form([
                    Select::make('status_id')
                        ->label('Status')
                        ->options(OrderStatus::query()->pluck('name', 'id'))
                        ->required(),
                ])
                ->action(function (array $data, SalesFlatOrder $record): void {
                    $record->status_id = $data['status_id'];
                    $record->save();
                }),

            Action::make('createInvoice')
                ->requiresConfirmation()
                ->label('Create Invoice')
                ->color(Color::Gray)
                ->hidden(fn(SalesFlatOrder $record) => $record->invoice)
                ->action(action: function (SalesFlatOrder $record): void {
                    $record->invoice()->create();
                }),

            Action::make('showInvoice')
                ->label(fn(SalesFlatOrder $record) => $record->invoice->serial)
                ->color(Color::Gray)
                ->hidden(fn(SalesFlatOrder $record) => !$record->invoice)
                ->action(action: function (SalesFlatOrder $record) {
                    return redirect(route('filament.obelaw-twist.resources.invoices.view', [$record->invoice]));
                }),

            Action::make('CancelOrder')
                ->visible(fn(SalesFlatOrder $record) => !$record->isCancel())
                ->color(Color::Red)
                ->form([
                    Select::make('reason_id')
                        ->label('Reason')
                        ->options(OrderCancelReason::query()->pluck('name', 'id'))
                        ->required(),
                ])
                ->action(action: function (array $data, SalesFlatOrder $record): void {
                    $record->reason_id = $data['reason_id'];
                    $record->cancel_at = now();
                    $record->save();
                }),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')->tabs([
                    Tabs\Tab::make('Order Information')
                        ->icon('heroicon-m-user')
                        ->schema([
                            TextEntry::make('serials.serial')
                                ->label('serial'),

                            TextEntry::make('status.name')
                                ->label('Status')
                                ->badge(),

                            TextEntry::make('salesperson.name')
                                ->label('Salesperson'),

                            TextEntry::make('grand_total')
                                ->label('Grand Total')
                                ->money('EGP'),
                        ])->columns(2),

                    Tabs\Tab::make('Customer Information')
                        ->icon('heroicon-m-user')
                        ->schema([
                            ImageEntry::make('customer.image')
                                ->label('Image'),

                            TextEntry::make('customer_name')
                                ->label('Customer Name'),

                            TextEntry::make('customer_phone')
                                ->label('Customer Phone'),

                            TextEntry::make('customer_email')
                                ->label('Customer Email'),
                        ]),
                ]),
            ])->columns(1);
    }
}
