<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class WarehouseDashboard extends Dashboard
{
    use HasFiltersForm;

    protected static string $routePath = '/dashboard/warehouse';
    protected static ?int $navigationSort = -2;
    protected static ?string $navigationLabel = 'Warehouse Dashboard';
    protected static ?string $navigationGroup = 'Dashboards';

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
            \Obelaw\ERP\Addons\Warehouse\Filament\Widgets\StatsOverviewWidget::class,
            \Obelaw\ERP\Addons\Warehouse\Filament\Widgets\TransferNeedApproveWidget::class,
        ];
    }
}
