<?php

namespace Obelaw\Purchasing\Filament\Resources\VendorResource;

use Filament\Resources\Pages\CreateRecord;
use Obelaw\Contacts\Lib\Enums\ContactType;
use Obelaw\Purchasing\Filament\Resources\VendorResource;

class CreateVendor extends CreateRecord
{
    protected static string $resource = VendorResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['document_type'] = ContactType::vendor;

        return $data;
    }
}
