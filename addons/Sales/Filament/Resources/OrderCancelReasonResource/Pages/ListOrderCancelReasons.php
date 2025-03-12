<?php

namespace Obelaw\Sales\Filament\Resources\OrderCancelReasonResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Sales\Filament\Resources\OrderCancelReasonResource;

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
