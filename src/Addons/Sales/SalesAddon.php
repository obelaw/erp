<?php

namespace Obelaw\ERP\Addons\Sales;

use Filament\Panel;
use Obelaw\ERP\Addons\Sales\Filament\Resources\CouponResource;
use Obelaw\ERP\Addons\Sales\Filament\Resources\SalesFlatOrderResource;
use Obelaw\Twist\Base\BaseAddon;

class SalesAddon extends BaseAddon
{
    public function pathMigrations()
    {
        return '/vendor/erp-o/erp/src/Addons/Sales/generate/migrations';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                SalesFlatOrderResource::class,
                CouponResource::class,
            ]);
    }
}
