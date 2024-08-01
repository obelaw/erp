<?php

namespace Obelaw\ERP\Addons\Purchasing;

use Filament\Panel;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\VendorResource;
use Obelaw\ERP\Addons\Warehouse\Filament\Pages\WarehouseDashboard;
use Obelaw\Twist\Base\BaseAddon;
use Obelaw\Twist\Treis\HasMigration;

class PurchasingAddon extends BaseAddon
{
    use HasMigration;

    public function register(Panel $panel): void
    {
        $panel
            ->discoverClusters(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Clusters',
                for: 'Obelaw\\ERP\\Addons\\Warehouse\\Filament\\Clusters'
            )
            ->resources([
                VendorResource::class,
            ])
            ->widgets([
                \Obelaw\ERP\Addons\Warehouse\Filament\Widgets\TransferNeedApproveWidget::class,
            ])
            ->pages([
                WarehouseDashboard::class,
            ]);
    }
}
