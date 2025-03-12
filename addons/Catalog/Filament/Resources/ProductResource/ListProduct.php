<?php

namespace Obelaw\Catalog\Filament\Resources\ProductResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Catalog\Filament\Resources\ProductResource;

class ListProduct extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
