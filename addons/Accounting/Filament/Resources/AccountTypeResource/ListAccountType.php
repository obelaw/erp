<?php

namespace Obelaw\Accounting\Filament\Resources\AccountTypeResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Accounting\Filament\Resources\AccountTypeResource;

class ListAccountType extends ListRecords
{
    protected static string $resource = AccountTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
