<?php

namespace Obelaw\Warehouse\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Obelaw\Warehouse\Filament\Clusters\WarehouseCluster;

class WarehouseDashboard extends Dashboard
{
    use HasFiltersForm;

    protected static ?string $cluster = WarehouseCluster::class;
    protected static ?string $title = 'Warehouse Dashboard';
    protected ?string $heading = 'Warehouse Dashboard';
    protected ?string $subheading = 'A quick look at your warehouse situation';
    protected static string $routePath = '/dashboard';
    protected static ?int $navigationSort = -99999;
    protected static ?string $navigationLabel = 'Warehouse Dashboard';

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        DatePicker::make('startDate')
                            ->maxDate(fn(Get $get) => $get('endDate') ?: now()->subDays(30)),

                        DatePicker::make('endDate')
                            ->minDate(fn(Get $get) => $get('startDate') ?: now())
                            ->maxDate(now()),
                    ])
                    ->columns(3),
            ]);
    }

    public function getWidgets(): array
    {
        return [
            \Obelaw\Warehouse\Filament\Widgets\StatsOverviewWidget::class,
            \Obelaw\Warehouse\Filament\Widgets\TransferNeedApproveWidget::class,
        ];
    }
}
