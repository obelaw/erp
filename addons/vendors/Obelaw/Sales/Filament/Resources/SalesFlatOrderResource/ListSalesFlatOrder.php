<?php

namespace Obelaw\Sales\Filament\Resources\SalesFlatOrderResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Sales\Filament\Resources\SalesFlatOrderResource;

class ListSalesFlatOrder extends ListRecords
{
    protected static string $resource = SalesFlatOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
