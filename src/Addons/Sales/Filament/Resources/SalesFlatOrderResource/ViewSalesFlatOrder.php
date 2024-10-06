<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Resources\SalesFlatOrderResource;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Obelaw\ERP\Addons\Sales\Filament\Resources\SalesFlatOrderResource;
use Obelaw\ERP\Addons\Sales\Models\SalesFlatOrder;
use Obelaw\ERP\Addons\Sales\Models\OrderStatus;

class ViewSalesFlatOrder extends ViewRecord
{
    protected static string $resource = SalesFlatOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('updateStatus')
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
                            TextEntry::make('status.name')
                                ->label('Status'),

                            TextEntry::make('salesperson.name')
                                ->label('Salesperson'),

                            TextEntry::make('grand_total')
                                ->label('Grand Total')
                                ->money('EGP'),
                        ]),

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
