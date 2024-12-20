<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Pages;

use Filament\Pages\Dashboard;
use Obelaw\Permit\Attributes\PagePermission;

#[PagePermission(
    id: 'permit.sales.sales_dashboard',
    title: 'Sales Dashboard',
    description: 'A quick look at your sales situation',
    category: 'Sales'
)]
class SalesDashboard extends Dashboard
{
    protected static ?string $title = 'Sales Dashboard';
    protected ?string $heading = 'Sales Dashboard';
    protected ?string $subheading = 'A quick look at your sales situation';
    protected static string $routePath = '/dashboard/sales';
    protected static ?int $navigationSort = -2;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Sales Dashboard';
    protected static ?string $navigationGroup = 'Dashboards';


    public function getWidgets(): array
    {
        return [
            \Obelaw\ERP\Addons\Sales\Filament\Widgets\StatsOverviewWidget::class,
            \Obelaw\ERP\Addons\Sales\Filament\Widgets\LatestOrdersWidget::class,
        ];
    }
}
