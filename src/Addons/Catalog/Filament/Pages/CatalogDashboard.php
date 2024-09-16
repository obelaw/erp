<?php

namespace Obelaw\ERP\Addons\Catalog\Filament\Pages;

use Filament\Pages\Dashboard;
use Obelaw\ERP\Addons\Catalog\Filament\Clusters\Catalog;

class CatalogDashboard extends Dashboard
{
    protected static ?string $cluster = Catalog::class;
    protected static string $routePath = '/dashboard';
    protected static ?int $navigationSort = -1;
    protected static ?string $navigationLabel = 'Catalog Dashboard';
    // protected static ?string $navigationGroup = 'Catalog';

    public function getWidgets(): array
    {
        return [
            \Obelaw\ERP\Addons\Catalog\Filament\Widgets\CatalogCountsWidget::class,
        ];
    }
}
