<?php

namespace Obelaw\ERP\Addons\Shipping\Filament\Resources\CourierAccountResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Obelaw\ERP\Addons\Shipping\Filament\Resources\CourierAccountResource;

class ListCourierAccounts extends ListRecords
{
    protected static string $resource = CourierAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
