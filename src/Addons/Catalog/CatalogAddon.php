<?php

namespace Obelaw\ERP\Addons\Catalog;

use Filament\Panel;
use Obelaw\ERP\Addons\Catalog\Filament\Pages\CatalogDashboard;
use Obelaw\ERP\Addons\Catalog\Filament\Resources\CatagoryResource;
use Obelaw\ERP\Addons\Catalog\Filament\Resources\ProductResource;
use Obelaw\Twist\Base\BaseAddon;
use Obelaw\Twist\Concerns\InteractsWithMigration;
use Obelaw\Twist\Contracts\HasMigration;

class CatalogAddon extends BaseAddon implements HasMigration
{
    use InteractsWithMigration;

    protected $pathMigrations = __DIR__ . '/../../../database/migrations/catalog';

    public function register(Panel $panel): void
    {
        $panel
            ->discoverClusters(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Clusters',
                for: 'Obelaw\\ERP\\Addons\\Catalog\\Filament\\Clusters'
            )
            ->pages([
                CatalogDashboard::class
            ])
            ->widgets([
                \Obelaw\ERP\Addons\Catalog\Filament\Widgets\CatalogCountsWidget::class,
            ])
            ->resources([
                CatagoryResource::class,
                ProductResource::class
            ]);
    }
}
