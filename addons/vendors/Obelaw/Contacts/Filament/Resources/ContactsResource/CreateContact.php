<?php

namespace Obelaw\Contacts\Filament\Resources\ContactsResource;

use Filament\Resources\Pages\CreateRecord;
use Obelaw\Contacts\Filament\Resources\ContactsResource;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // dd($data);
        return $data;
    }
}
