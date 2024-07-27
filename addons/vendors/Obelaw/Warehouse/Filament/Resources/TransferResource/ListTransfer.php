<?php

namespace Obelaw\Warehouse\Filament\Resources\TransferResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Warehouse\Filament\Resources\TransferResource;

class ListTransfer extends ListRecords
{
    protected static string $resource = TransferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
