<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Resources\SalesFlatOrderResource;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Obelaw\ERP\Addons\Sales\Filament\Resources\SalesFlatOrderResource;

class ViewSalesFlatOrder extends ViewRecord
{
    protected static string $resource = SalesFlatOrderResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')->tabs([
                    Tabs\Tab::make('Customer Information')
                        ->icon('heroicon-m-information-circle')
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
