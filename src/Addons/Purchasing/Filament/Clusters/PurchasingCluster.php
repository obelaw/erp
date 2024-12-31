<?php

namespace Obelaw\ERP\Addons\Purchasing\Filament\Clusters;

use Filament\Clusters\Cluster;

class PurchasingCluster extends Cluster
{
    protected static ?int $navigationSort = 1000;
    protected static ?string $navigationGroup = 'ERP';
    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationLabel = 'Purchasing';
}
