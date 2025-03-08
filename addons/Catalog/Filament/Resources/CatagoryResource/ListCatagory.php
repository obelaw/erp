<?php

namespace Obelaw\ERP\Addons\Catalog\Filament\Resources\CatagoryResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\ERP\Addons\Catalog\Filament\Resources\CatagoryResource;

class ListCatagory extends ListRecords
{
    protected static string $resource = CatagoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
