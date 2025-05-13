<?php

namespace Obelaw\Purchasing\Filament\Clusters;

use Filament\Clusters\Cluster;

class PurchasingCluster extends Cluster
{
    protected static ?int $navigationSort = 1000;
    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationLabel = 'Purchasing';

    public static function getNavigationGroup(): ?string
    {
        if (config('obelaw.flow.navigation_group'))
            return config('obelaw.flow.navigation_group');

        return 'Flow';
    }
}
