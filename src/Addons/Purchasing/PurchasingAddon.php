<?php

namespace Obelaw\ERP\Addons\Purchasing;

use Filament\Panel;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PaymentTermResource;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\VendorResource;
use Obelaw\Twist\Base\BaseAddon;

class PurchasingAddon extends BaseAddon
{
    public function pathMigrations()
    {
        return '/vendor/obelaw/erp/src/Addons/Purchasing/generate/migrations';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->discoverClusters(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Clusters',
                for: 'Obelaw\\ERP\\Addons\\Purchasing\\Filament\\Clusters'
            )
            ->resources([
                VendorResource::class,
                PurchaseOrderResource::class,
                PaymentTermResource::class,
            ])
            ->widgets([
                \Obelaw\ERP\Addons\Warehouse\Filament\Widgets\TransferNeedApproveWidget::class,
            ])
            ->pages([]);
    }
}
