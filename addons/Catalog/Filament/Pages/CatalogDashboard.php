<?php

namespace Obelaw\Catalog\Filament\Pages;

use Filament\Pages\Dashboard;
use Obelaw\Catalog\Filament\Clusters\CatalogCluster;

class CatalogDashboard extends Dashboard
{
    protected static ?string $cluster = CatalogCluster::class;
    protected static string $routePath = '/dashboard';
    protected static ?int $navigationSort = -1;
    protected static ?string $navigationLabel = 'Catalog Dashboard';
    // protected static ?string $navigationGroup = 'Catalog';

    public function getWidgets(): array
    {
        return [
            \Obelaw\Catalog\Filament\Widgets\CatalogCountsWidget::class,
        ];
    }
}
