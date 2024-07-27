<?php

namespace Obelaw\Warehouse\Filament;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Obelaw\Warehouse\Filament\Pages\WarehouseDashboard;
use Obelaw\Warehouse\Filament\Resources\AdjustmentResource;
use Obelaw\Warehouse\Filament\Resources\InventoryResource;
use Obelaw\Warehouse\Filament\Resources\TransferResource;
use Obelaw\Warehouse\Filament\Resources\WarehouseResource;

class ERPWarehouseModule implements Plugin
{
    public function getId(): string
    {
        return 'erp-o-warehouse';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                WarehouseResource::class,
                InventoryResource::class,
                AdjustmentResource::class,
                TransferResource::class,
            ])
            ->widgets([
                \Obelaw\Warehouse\Filament\Widgets\TransferNeedApproveWidget::class,
            ])
            ->pages([
                WarehouseDashboard::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
