<?php

namespace Obelaw\ERP\Addons\Sales;

use Filament\Panel;
use Obelaw\ERP\Addons\Sales\Filament\Pages\SalesDashboard;
use Obelaw\ERP\Addons\Sales\Filament\Resources\CouponResource;
use Obelaw\ERP\Addons\Sales\Filament\Resources\CustomerResource;
use Obelaw\ERP\Addons\Sales\Filament\Resources\SalesFlatOrderResource;
use Obelaw\Twist\Base\BaseAddon;

class SalesAddon extends BaseAddon
{
    public function pathMigrations()
    {
        return '/vendor/obelaw/erp/src/Addons/Sales/generate/migrations';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->discoverClusters(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Clusters',
                for: 'Obelaw\\ERP\\Addons\\Sales\\Filament\\Clusters'
            )
            ->resources([
                SalesFlatOrderResource::class,
                CouponResource::class,
                CustomerResource::class,
            ])
            ->widgets([
                \Obelaw\ERP\Addons\Sales\Filament\Widgets\StatsOverviewWidget::class,
                \Obelaw\ERP\Addons\Sales\Filament\Widgets\LatestOrdersWidget::class,
            ])
            ->pages([
                SalesDashboard::class,
            ]);
    }
}
