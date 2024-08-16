<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Pages;

use Filament\Pages\Dashboard;

class WarehouseDashboard extends Dashboard
{
    protected static string $routePath = '/dashboard/warehouse';
    protected static ?int $navigationSort = -2;
    protected static ?string $navigationLabel = 'Warehouse Dashboard';
    protected static ?string $navigationGroup = 'Dashboards';

    public function getWidgets(): array
    {
        return [
            \Obelaw\ERP\Addons\Warehouse\Filament\Widgets\TransferNeedApproveWidget::class,
        ];
    }
}
