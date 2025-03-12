<?php

namespace Obelaw\Sales\Filament\Resources\StatusResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Sales\Filament\Resources\StatusResource;

class ListStatuses extends ListRecords
{
    protected static string $resource = StatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
