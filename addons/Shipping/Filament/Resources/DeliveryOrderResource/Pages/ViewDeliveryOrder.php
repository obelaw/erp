<?php

namespace Obelaw\Shipping\Filament\Resources\DeliveryOrderResource\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Obelaw\Shipping\Filament\Resources\DeliveryOrderResource;
use Obelaw\Shipping\Lib\Services\DeliveryOrderService;
use Obelaw\Shipping\Models\CourierAccount;
use Obelaw\Shipping\Models\DeliveryOrder;

class ViewDeliveryOrder extends ViewRecord
{
    protected static string $resource = DeliveryOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('selectAccount')
                ->label('Select Account')
                ->hidden(fn(DeliveryOrder $record) => !is_null($record->account_id))
                ->form([
                    Select::make(name: 'account_id')
                        ->label(label: 'Account')
                        ->required()
                        ->options(CourierAccount::pluck('name', 'id'))
                        ->searchable(),
                ])
                ->action(function (array $data, DeliveryOrder $record): void {
                    $record->account_id = $data['account_id'];
                    $record->save();
                }),

            Action::make('ship')
                ->label('Ship it')
                ->hidden(fn(DeliveryOrder $record) => is_null($record->account_id))
                ->disabled(fn(DeliveryOrder $record) => DeliveryOrderService::make()->isHasAWB($record))
                ->action(function (DeliveryOrder $record): void {
                    $classInstance = new $record->account->courier->class_instance($record->account, $record);
                    $classInstance->doShip();
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
                            TextEntry::make('cod_amount')
                                ->label('COD')
                                ->money('EGP'),
                        ]),

                    Tabs\Tab::make('Shipping Information')
                        ->icon('heroicon-m-user')
                        ->schema([
                            TextEntry::make('order.address.postcode')
                                ->label('Phone Number'),

                            TextEntry::make('order.address.street_line_1')
                                ->label('Street Line 1'),

                            TextEntry::make('order.address.phone_number')
                                ->label('Phone Number'),
                        ]),
                ]),
            ])->columns(1);
    }
}
