<?php

namespace Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource;

class ViewPurchaseOrder extends ViewRecord
{
    protected static string $resource = PurchaseOrderResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')->tabs([
                    Tabs\Tab::make('Customer Information')
                        ->icon('heroicon-m-information-circle')
                        ->schema([
                            ImageEntry::make('vendor.image')
                                ->label('Image'),

                            TextEntry::make('vendor.name')
                                ->label('Vendor Name'),

                            TextEntry::make('vendor.phone')
                                ->label('Vendor Phone'),

                            TextEntry::make('vendor.email')
                                ->label('Vendor Email'),
                        ]),
                ]),
            ])->columns(1);
    }
}
