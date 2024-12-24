<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Clusters;

use Filament\Clusters\Cluster;

class AccountingCluster extends Cluster
{
    protected static ?int $navigationSort = 1000;
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';
    protected static ?string $navigationLabel = 'Accounting';
}
