<?php

namespace Obelaw\Warehouse\Filament\Clusters;

use Filament\Clusters\Cluster;

class WarehouseCluster extends Cluster
{
    protected static ?int $navigationSort = 1000;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Warehouse';

    public static function getNavigationGroup(): ?string
    {
        if (config('obelaw.flow.navigation_group'))
            return config('obelaw.flow.navigation_group');

        return 'Flow';
    }
}
