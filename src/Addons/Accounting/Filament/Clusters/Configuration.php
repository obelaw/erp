<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Clusters;

use Filament\Clusters\Cluster;

class Configuration extends Cluster
{
    protected static ?int $navigationSort = 99999;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Accounting';
}
