<?php

namespace Obelaw\Sales\Filament\Clusters;

use Filament\Clusters\Cluster;

class SalesCluster extends Cluster
{
    protected static ?int $navigationSort = 1000;
    protected static ?string $navigationGroup = 'ERP';
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Sales';
}
