<?php

namespace Obelaw\Sales\Filament;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Obelaw\Sales\Filament\Resources\SalesFlatOrderResource;

class ERPSalesModule implements Plugin
{
    public function getId(): string
    {
        return 'erp-o-sales';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                SalesFlatOrderResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
