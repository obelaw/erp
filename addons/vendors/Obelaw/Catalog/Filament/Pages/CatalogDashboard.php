<?php

namespace Obelaw\Catalog\Filament\Pages;

use Filament\Pages\Dashboard;

class CatalogDashboard extends Dashboard
{
    protected static string $routePath = '/catalog';
    protected static ?int $navigationSort = -2;
    protected static ?string $navigationLabel = 'Catalog Dashboard';
    protected static ?string $navigationGroup = 'Catalog';

    public function getWidgets(): array
    {
        return [
            \Obelaw\Catalog\Filament\Widgets\CatalogCountsWidget::class,
        ];
    }
}
