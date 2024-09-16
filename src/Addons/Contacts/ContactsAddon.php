<?php

namespace Obelaw\ERP\Addons\Contacts;

use Filament\Panel;
use Obelaw\ERP\Addons\Audit\Filament\Resources\SerialResource;
use Obelaw\Twist\Base\BaseAddon;

class ContactsAddon extends BaseAddon
{
    public function pathMigrations()
    {
        return '/vendor/obelaw/erp/src/Addons/Contacts/generate/migrations';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                SerialResource::class
            ]);
    }
}
