<?php

namespace Obelaw\Catalog;

use Filament\Panel;
use Obelaw\Catalog\Filament\Pages\CatalogDashboard;
use Obelaw\Catalog\Filament\Resources\CatagoryResource;
use Obelaw\Catalog\Filament\Resources\ProductResource;
use Obelaw\Twist\Base\BaseAddon;
use Obelaw\Twist\Concerns\InteractsWithMigration;
use Obelaw\Twist\Contracts\HasMigration;

class CatalogAddon extends BaseAddon implements HasMigration
{
    use InteractsWithMigration;

    protected $pathMigrations = __DIR__ . '/database/migrations';

    public function register(Panel $panel): void
    {
        $panel
            ->discoverClusters(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Clusters',
                for: 'Obelaw\\Catalog\\Filament\\Clusters'
            )
            ->pages([
                CatalogDashboard::class
            ])
            ->widgets([
                \Obelaw\Catalog\Filament\Widgets\CatalogCountsWidget::class,
            ])
            ->resources([
                CatagoryResource::class,
                ProductResource::class
            ]);
    }
}
