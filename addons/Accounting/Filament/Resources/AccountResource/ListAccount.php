<?php

namespace Obelaw\Accounting\Filament\Resources\AccountResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Accounting\Filament\Resources\AccountResource;

class ListAccount extends ListRecords
{
    protected static string $resource = AccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
