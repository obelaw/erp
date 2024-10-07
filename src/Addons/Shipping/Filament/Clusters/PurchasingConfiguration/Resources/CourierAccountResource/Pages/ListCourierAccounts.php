<?php

namespace Obelaw\ERP\Addons\Shipping\Filament\Clusters\PurchasingConfiguration\Resources\CourierAccountResource\Pages;

use Obelaw\ERP\Addons\Shipping\Filament\Clusters\PurchasingConfiguration\Resources\CourierAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

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
