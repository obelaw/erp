<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Clusters;

use Filament\Clusters\Cluster;

class SalesSettings extends Cluster
{
    protected static ?int $navigationSort = 99999;
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationIcon = 'heroicon-o-cog';
}
