<?php

namespace Obelaw\Purchasing\Filament\Resources\PaymentTermResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Purchasing\Filament\Resources\PaymentTermResource;

class ListPaymentTerm extends ListRecords
{
    protected static string $resource = PaymentTermResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
