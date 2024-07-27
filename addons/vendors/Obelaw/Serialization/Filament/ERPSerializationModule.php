<?php

namespace Obelaw\Serialization\Filament;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Obelaw\Serialization\Filament\Resources\SerialResource;

class ERPSerializationModule implements Plugin
{
    public function getId(): string
    {
        return 'erp-o-contacts';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                SerialResource::class
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
