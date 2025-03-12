<?php

namespace Obelaw\Shipping\Filament\Clusters;

use Filament\Clusters\Cluster;

class ShippingCluster extends Cluster
{
    protected static ?int $navigationSort = 1000;
    protected static ?string $navigationGroup = 'ERP';
    protected static ?string $navigationIcon = 'heroicon-o-truck';
}
