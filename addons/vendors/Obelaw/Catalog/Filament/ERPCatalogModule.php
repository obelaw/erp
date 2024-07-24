<?php

namespace Obelaw\Catalog\Filament;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Obelaw\Catalog\Filament\Resources\CatagoryResource;
use Obelaw\Catalog\Filament\Resources\ProductResource;

class ERPCatalogModule implements Plugin
{
    public function getId(): string
    {
        return 'erp-o-catalog';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                CatagoryResource::class,
                ProductResource::class
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
