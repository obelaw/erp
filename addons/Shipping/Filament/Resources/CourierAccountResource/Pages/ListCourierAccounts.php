<?php

namespace Obelaw\Shipping\Filament\Resources\CourierAccountResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Shipping\Filament\Resources\CourierAccountResource;

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
