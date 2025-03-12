<?php

namespace Obelaw\Sales\Filament\Pages;

use Filament\Pages\Dashboard;
use Obelaw\Sales\Filament\Clusters\SalesCluster;
use Obelaw\Permit\Attributes\PagePermission;

#[PagePermission(
    id: 'permit.sales.sales_dashboard',
    title: 'Sales Dashboard',
    description: 'A quick look at your sales situation',
    category: 'Sales'
)]
class SalesDashboard extends Dashboard
{
    protected static ?string $cluster = SalesCluster::class;
    protected static ?string $title = 'Sales Dashboard';
    protected ?string $heading = 'Sales Dashboard';
    protected ?string $subheading = 'A quick look at your sales situation';
    protected static string $routePath = '/dashboard';
    protected static ?int $navigationSort = -99999;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Dashboard';


    public function getWidgets(): array
    {
        return [
            \Obelaw\Sales\Filament\Widgets\StatsOverviewWidget::class,
            \Obelaw\Sales\Filament\Widgets\LatestOrdersWidget::class,
        ];
    }
}
