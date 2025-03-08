<?php

namespace Obelaw\ERP\Addons\Audit\Filament\Resources\SerialResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\ERP\Addons\Audit\Filament\Resources\SerialResource;

class ListSerial extends ListRecords
{
    protected static string $resource = SerialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
