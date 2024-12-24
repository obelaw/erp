<?php

namespace Obelaw\ERP\Addons\Sales;

use Filament\Panel;
use Obelaw\ERP\Addons\Sales\Filament\Pages\Reporting\SalesReportPage;
use Obelaw\ERP\Addons\Sales\Filament\Pages\SalesDashboard;
use Obelaw\ERP\Addons\Sales\Filament\Resources\CouponResource;
use Obelaw\ERP\Addons\Sales\Filament\Resources\CustomerResource;
use Obelaw\ERP\Addons\Sales\Filament\Resources\InvoiceResource;
use Obelaw\ERP\Addons\Sales\Filament\Resources\OrderCancelReasonResource;
use Obelaw\ERP\Addons\Sales\Filament\Resources\SalesFlatOrderResource;
use Obelaw\ERP\Addons\Sales\Filament\Resources\StatusResource;
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
                InvoiceResource::class,
                CouponResource::class,
                CustomerResource::class,
                OrderCancelReasonResource::class,
                StatusResource::class,
            ])
            ->widgets([
                \Obelaw\ERP\Addons\Sales\Filament\Widgets\StatsOverviewWidget::class,
                \Obelaw\ERP\Addons\Sales\Filament\Widgets\LatestOrdersWidget::class,
                \Obelaw\ERP\Addons\Sales\Filament\Pages\Reporting\Widgets\SalesChartWidget::class,
            ])
            ->pages([
                SalesDashboard::class,
                SalesReportPage::class,
            ]);
    }
}
