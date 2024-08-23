<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountEntryResource;

use Filament\Resources\Pages\CreateRecord;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\AccountEntryResource;

class CreateAccountEntry extends CreateRecord
{
    protected static string $resource = AccountEntryResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // dd($data);
        return $data;
    }
}
