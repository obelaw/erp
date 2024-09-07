<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Resources\CustomerResource\Pages;

use Obelaw\ERP\Addons\Sales\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
