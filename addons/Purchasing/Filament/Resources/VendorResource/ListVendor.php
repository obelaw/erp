<?php

namespace Obelaw\ERP\Addons\Purchasing\Filament\Resources\VendorResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\VendorResource;

class ListVendor extends ListRecords
{
    protected static string $resource = VendorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
