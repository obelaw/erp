<?php

namespace Obelaw\Contacts\Filament\Resources\ContactsResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Contacts\Filament\Resources\ContactsResource;

class ListContact extends ListRecords
{
    protected static string $resource = ContactsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
