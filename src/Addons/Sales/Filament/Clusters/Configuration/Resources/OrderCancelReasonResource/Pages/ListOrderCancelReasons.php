<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Clusters\Configuration\Resources\OrderCancelReasonResource\Pages;

use Obelaw\ERP\Addons\Sales\Filament\Clusters\Configuration\Resources\OrderCancelReasonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderCancelReasons extends ListRecords
{
    protected static string $resource = OrderCancelReasonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
