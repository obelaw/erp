<?php

namespace Obelaw\Catalog\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Obelaw\Catalog\Lib\Services\ProductService;

class CatalogCountsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $productService = new ProductService;
        return [
            Stat::make('Consumable Products', $productService->getCountConsumableType())
                ->icon('heroicon-o-archive-box'),

            Stat::make('Service Products', $productService->getCountServiceType())
                ->icon('heroicon-o-server'),

            Stat::make('Storable Products', $productService->getCountStorableType())
                ->icon('heroicon-o-archive-box'),
        ];
    }
}
