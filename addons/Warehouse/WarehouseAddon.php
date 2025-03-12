<?php

namespace Obelaw\Warehouse;

use Filament\Panel;
use Obelaw\Warehouse\Filament\Pages\WarehouseDashboard;
use Obelaw\Warehouse\Filament\Resources\AdjustmentResource;
use Obelaw\Warehouse\Filament\Resources\InventoryResource;
use Obelaw\Warehouse\Filament\Resources\TransferResource;
use Obelaw\Warehouse\Filament\Resources\WarehouseResource;
use Obelaw\Twist\Base\BaseAddon;
use Obelaw\Twist\Concerns\InteractsWithMigration;
use Obelaw\Twist\Contracts\HasMigration;


class WarehouseAddon extends BaseAddon implements HasMigration
{
    use InteractsWithMigration;

    protected $pathMigrations = __DIR__ . '/database/migrations';

    public function register(Panel $panel): void
    {
        $panel
            ->discoverClusters(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Clusters',
                for: 'Obelaw\\Warehouse\\Filament\\Clusters'
            )
            ->resources([
                WarehouseResource::class,
                InventoryResource::class,
                AdjustmentResource::class,
                TransferResource::class,
            ])
            ->widgets([
                \Obelaw\Warehouse\Filament\Widgets\StatsOverviewWidget::class,
                \Obelaw\Warehouse\Filament\Widgets\TransferNeedApproveWidget::class,
            ])
            ->pages([
                WarehouseDashboard::class,
            ]);
    }
}
