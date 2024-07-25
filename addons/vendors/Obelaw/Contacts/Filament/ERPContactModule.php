<?php

namespace Obelaw\Contacts\Filament;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Obelaw\Contacts\Filament\Resources\ContactsResource;

class ERPContactModule implements Plugin
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
