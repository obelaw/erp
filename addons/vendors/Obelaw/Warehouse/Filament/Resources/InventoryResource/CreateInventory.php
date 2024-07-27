<?php

namespace Obelaw\Warehouse\Filament\Resources\InventoryResource;

use Filament\Resources\Pages\CreateRecord;
use Obelaw\Warehouse\Enums\PlaceType;
use Obelaw\Warehouse\Filament\Resources\InventoryResource;

class CreateInventory extends CreateRecord
{
    protected static string $resource = InventoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['record_type'] = PlaceType::INVENTORY;
        return $data;
    }
}
