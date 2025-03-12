<?php

namespace Obelaw\Purchasing\Filament\Resources\PurchaseOrderResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Purchasing\Filament\Resources\PurchaseOrderResource;

class ListPurchaseOrder extends ListRecords
{
    protected static string $resource = PurchaseOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
