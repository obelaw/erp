<?php

namespace Obelaw\Warehouse\Filament\Resources\InventoryResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Warehouse\Filament\Resources\InventoryResource;

class ListInventory extends ListRecords
{
    protected static string $resource = InventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
