<?php

namespace Obelaw\ERP\Addons\Shipping\Filament\Resources\DeliveryOrderResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Obelaw\ERP\Addons\Shipping\Filament\Resources\DeliveryOrderResource;

class ListDeliveryOrder extends ListRecords
{
    protected static string $resource = DeliveryOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
