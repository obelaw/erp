<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Pages\Reporting;

use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard;
use Filament\Pages\Dashboard\Actions\FilterAction;
use Filament\Pages\Dashboard\Concerns\HasFiltersAction;
use Obelaw\ERP\Addons\Sales\Filament\Clusters\SalesCluster;
use Obelaw\Permit\Attributes\PagePermission;

#[PagePermission(
    id: 'permit.sales.sales_report',
    title: 'Sales Report',
    description: 'Sales report for a detailed overview',
    category: 'Sales Report'
)]
class SalesReportPage extends Dashboard
{
    use HasFiltersAction;

    protected static ?string $cluster = SalesCluster::class;
    protected static ?string $title = 'Sales Report';
    protected ?string $heading = 'Sales Report';
    protected ?string $subheading = 'Sales report for a detailed overview';
    protected static string $routePath = '/sales/report/sales';
    protected static ?int $navigationSort = 99999;
    protected static ?string $navigationGroup = 'Reports';
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Sales Report';

    protected function getHeaderActions(): array
    {
        return [
            FilterAction::make()
                ->form([
                    DatePicker::make('startDate'),
                    DatePicker::make('endDate'),
                ]),
        ];
    }

    public function getWidgets(): array
    {
        return [
            \Obelaw\ERP\Addons\Sales\Filament\Pages\Reporting\Widgets\SalesChartWidget::class,
        ];
    }
}
