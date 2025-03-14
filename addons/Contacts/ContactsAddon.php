<?php

namespace Obelaw\Contacts;

use Filament\Panel;
use Obelaw\Audit\Filament\Resources\SerialResource;
use Obelaw\Twist\Base\BaseAddon;
use Obelaw\Twist\Concerns\InteractsWithMigration;
use Obelaw\Twist\Contracts\HasMigration;

class ContactsAddon extends BaseAddon implements HasMigration
{
    use InteractsWithMigration;

    protected $pathMigrations = __DIR__ . '/database/migrations';

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                SerialResource::class
            ]);
    }
}
