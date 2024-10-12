<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Resources\InvoiceResource;

use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Obelaw\ERP\Addons\Sales\Filament\Resources\InvoiceResource;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')->tabs([
                    Tabs\Tab::make('Order Invoice')
                        ->icon('heroicon-m-user')
                        ->schema([
                            TextEntry::make('serials.serial')
                                ->label('Serial'),

                            TextEntry::make('order.grand_total')
                                ->label('Grand Total')
                                ->money('EGP'),

                            TextEntry::make('status')
                                ->label('Status'),
                        ])->columns(1),
                ]),
            ])->columns(1);
    }
}
