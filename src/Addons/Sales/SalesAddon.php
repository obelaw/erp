<?php

namespace Obelaw\ERP\Addons\Sales;

use Filament\Panel;
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
            ->discoverResources(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Resources',
                for: 'Obelaw\\ERP\\Addons\\Sales\\Filament\\Resources'
            )
            ->discoverPages(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Pages',
                for: 'Obelaw\\ERP\\Addons\\Sales\\Filament\\Pages'
            )
            ->discoverClusters(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Clusters',
                for: 'Obelaw\\ERP\\Addons\\Sales\\Filament\\Clusters'
            )
            ->discoverWidgets(
                in: __DIR__ . DIRECTORY_SEPARATOR . 'Filament' . DIRECTORY_SEPARATOR . 'Widgets',
                for: 'Obelaw\\ERP\\Addons\\Sales\\Filament\\Widgets'
            );
    }
}
