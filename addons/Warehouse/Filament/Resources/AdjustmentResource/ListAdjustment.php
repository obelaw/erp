<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Resources\AdjustmentResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\AdjustmentResource;

class ListAdjustment extends ListRecords
{
    protected static string $resource = AdjustmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
