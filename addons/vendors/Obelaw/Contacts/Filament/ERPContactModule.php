<?php

namespace Obelaw\Contacts\Filament;

use Filament\Panel;
use Obelaw\Contacts\Filament\Resources\ContactsResource;
use Obelaw\Twist\Base\BaseAddon;

class ERPContactModule implements BaseAddon
{
    public function getId(): string
    {
        return 'erp-o-contacts';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                ContactsResource::class
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
