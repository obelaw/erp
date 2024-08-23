<?php

namespace Obelaw\ERP\Addons\Warehouse;

use Filament\Panel;
use Obelaw\ERP\Addons\Warehouse\Filament\Pages\WarehouseDashboard;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\AdjustmentResource;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\InventoryResource;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\TransferResource;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\WarehouseResource;
use Obelaw\Twist\Base\BaseAddon;
use Obelaw\Twist\Treis\HasMigration;

class WarehouseAddon extends BaseAddon
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
                WarehouseResource::class,
                InventoryResource::class,
                AdjustmentResource::class,
                TransferResource::class,
            ])
            ->widgets([
                \Obelaw\ERP\Addons\Warehouse\Filament\Widgets\StatsOverviewWidget::class,
                \Obelaw\ERP\Addons\Warehouse\Filament\Widgets\TransferNeedApproveWidget::class,
            ])
            ->pages([
                WarehouseDashboard::class,
            ]);
    }
}
