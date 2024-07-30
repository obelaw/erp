<?php

namespace Obelaw\ERP\Addons\Catalog\Filament\Clusters;

use Filament\Clusters\Cluster;

class Catalog extends Cluster
{
    protected static ?int $navigationSort = 999;
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationGroup = 'Helper';
}
