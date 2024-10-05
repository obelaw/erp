<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;
use Obelaw\ERP\Addons\Sales\Models\SalesFlatOrder;
use Obelaw\Permit\Attributes\WidgetPermission;

#[WidgetPermission(
    id: 'permit.sales.widgets.stats_overvie',
    title: 'Stats Overview Widget',
    description: 'Show orders counters',
    category: 'Sales Dashboard'
)]
class StatsOverviewWidget extends BaseWidget
{
    /**
     * Summary of getStats
     * @return array
     */
    protected function getStats(): array
    {
        return [
            Stat::make(
                'Number of orders today',
                Number::format(SalesFlatOrder::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->count())
            ),

            Stat::make(
                'Number of orders yesterday',
                Number::format(SalesFlatOrder::whereBetween('created_at', [Carbon::now()->subDay()->startOfDay(), Carbon::now()->subDay()->endOfDay()])->count())
            ),

            Stat::make(
                'Number of orders this month',
                Number::format(SalesFlatOrder::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->subDay()->endOfMonth()])->count())
            ),
        ];
    }
}