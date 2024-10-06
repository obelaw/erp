<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Clusters\Configuration\Resources\StatusResource\Pages;

use Obelaw\ERP\Addons\Sales\Filament\Clusters\Configuration\Resources\StatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

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
