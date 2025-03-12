<?php

namespace Obelaw\Catalog\Filament\Clusters;

use Filament\Clusters\Cluster;

class CatalogCluster extends Cluster
{
    protected static ?int $navigationSort = 1000;
    protected static ?string $navigationGroup = 'ERP';
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
}
