<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Resources\WarehouseResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\WarehouseResource;

class ListWarehouse extends ListRecords
{
    protected static string $resource = WarehouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
