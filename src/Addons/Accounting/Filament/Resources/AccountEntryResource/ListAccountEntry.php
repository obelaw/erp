<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountEntryResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountEntryResource;

class ListAccountEntry extends ListRecords
{
    protected static string $resource = AccountEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
