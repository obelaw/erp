<?php

namespace Obelaw\Accounting\Filament\Resources\TransactionResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Accounting\Filament\Resources\TransactionResource;

class ListTransaction extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
