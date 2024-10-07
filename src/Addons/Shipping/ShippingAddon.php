<?php

namespace Obelaw\ERP\Addons\Shipping;

use Filament\Panel;
use Obelaw\ERP\Addons\Shipping\Filament\Resources\DeliveryOrderResource;
use Obelaw\Twist\Base\BaseAddon;

class ShippingAddon extends BaseAddon
{
    public function pathMigrations()
    {
        return '/vendor/obelaw/erp/src/Addons/Shipping/generate/migrations';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->discoverClusters(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Clusters',
                for: 'Obelaw\\ERP\\Addons\\Shipping\\Filament\\Clusters'
            )
            ->resources([
                DeliveryOrderResource::class,
            ]);
    }
}
