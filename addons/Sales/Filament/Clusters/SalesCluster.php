<?php

namespace Obelaw\Sales\Filament\Clusters;

use Filament\Clusters\Cluster;

class SalesCluster extends Cluster
{
    protected static ?int $navigationSort = 1000;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Sales';

    public static function getNavigationGroup(): ?string
    {
        if (config('obelaw.flow.navigation_group'))
            return config('obelaw.flow.navigation_group');

        return 'Flow';
    }
}
