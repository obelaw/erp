<?php

namespace Obelaw\ERP\Addons\Shipping\Filament\Resources\CourierAccountResource\Pages;

use Obelaw\ERP\Addons\Shipping\Filament\Resources\CourierAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourierAccount extends EditRecord
{
    protected static string $resource = CourierAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
