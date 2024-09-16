<?php

namespace Obelaw\ERP\Addons\Purchasing\Filament\Clusters;

use Filament\Clusters\Cluster;

class PurchasingConfiguration extends Cluster
{
    protected static ?int $navigationSort = 99999;
    protected static ?string $slug = 'purchasing/configuration';
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Configuration';
    protected static ?string $navigationGroup = 'Purchasing';
    protected static ?string $navigationU = 'Purchasing';
}
