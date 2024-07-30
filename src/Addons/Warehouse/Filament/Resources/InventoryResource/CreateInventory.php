<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Resources\InventoryResource;

use Filament\Resources\Pages\CreateRecord;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\InventoryResource;
use Obelaw\Warehouse\Enums\PlaceType;

class CreateInventory extends CreateRecord
{
    protected static string $resource = InventoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['record_type'] = PlaceType::INVENTORY;
        return $data;
    }
}
