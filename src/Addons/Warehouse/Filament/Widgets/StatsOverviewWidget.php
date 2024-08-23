<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Obelaw\ERP\Addons\Warehouse\Models\Place\Inventory;
use Obelaw\ERP\Addons\Warehouse\Models\Place\Warehouse;
use Obelaw\ERP\Addons\Warehouse\Models\Transfer;

class StatsOverviewWidget extends BaseWidget
{
    use InteractsWithPageFilters;
    
    protected function getStats(): array
    {
        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            now()->subDays(30);

        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate']) :
            now();

        return [
            Stat::make('Warehouse Count', Warehouse::count()),

            Stat::make('Inventory Count', Inventory::count()),

            Stat::make('Transfer Count', Transfer::whereBetween('created_at', [$startDate, $endDate])->count())
                ->chart(array_column(
                    Transfer::whereBetween('created_at', [$startDate, $endDate])->selectRaw("COUNT(*) views, DATE_FORMAT(created_at, '%Y %m %e') date")
                        ->groupBy('date')
                        ->get()->toArray(),
                    'views'
                ))
                ->color('success'),
        ];
    }
}
