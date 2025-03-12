<?php

namespace Obelaw\Accounting\Filament\Resources\PaymentMethodResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Accounting\Filament\Resources\PaymentMethodResource;

class ListPaymentMethod extends ListRecords
{
    protected static string $resource = PaymentMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
