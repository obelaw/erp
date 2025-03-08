<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Resources\InventoryResource;

use Filament\Actions\EditAction;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\InventoryResource;

class ViewInventory extends ViewRecord
{
    protected static string $resource = InventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Information')
                            ->icon('heroicon-m-information-circle')
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('code'),
                            ]),
                    ])
            ])->columns(1);
    }
}
