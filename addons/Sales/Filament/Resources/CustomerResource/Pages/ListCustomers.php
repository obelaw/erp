<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Resources\CustomerResource\Pages;

use Obelaw\ERP\Addons\Sales\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
