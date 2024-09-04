<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountTypeResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountTypeResource;

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
