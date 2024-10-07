<?php

namespace Obelaw\ERP\Addons\Shipping\Filament\Clusters;

use Filament\Clusters\Cluster;

class PurchasingConfiguration extends Cluster
{
    protected static ?int $navigationSort = 99999;
    protected static ?string $slug = 'shipping/configuration';
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Configuration';
    protected static ?string $navigationGroup = 'Shipping';
}
