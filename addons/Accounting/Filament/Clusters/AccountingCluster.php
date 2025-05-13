<?php

namespace Obelaw\Accounting\Filament\Clusters;

use Filament\Clusters\Cluster;

class AccountingCluster extends Cluster
{
    protected static ?int $navigationSort = 1000;
    protected static ?string $navigationIcon = 'heroicon-o-calculator';
    protected static ?string $navigationLabel = 'Accounting';

    public static function getNavigationGroup(): ?string
    {
        if (config('obelaw.flow.navigation_group'))
            return config('obelaw.flow.navigation_group');

        return 'Flow';
    }
}
