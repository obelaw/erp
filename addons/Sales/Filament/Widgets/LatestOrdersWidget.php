<?php

namespace Obelaw\ERP\Addons\Sales\Filament\Widgets;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Obelaw\ERP\Addons\Sales\Models\SalesFlatOrder;
use Obelaw\Permit\Attributes\WidgetPermission;

#[WidgetPermission(
    id: 'permit.sales.widgets.latest_orders',
    title: 'Latest Orders Widget',
    description: 'Show the last 10 orders created by customers',
    category: 'Sales Dashboard'
)]
class LatestOrdersWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->query(function () {
                $query = SalesFlatOrder::query();
                $query->orderBy('id', 'DESC');
                $query->take(10);
                return $query;
            })
            ->columns([
                TextColumn::make('serials.serial')->searchable(),
                TextColumn::make('salesperson.name')->searchable(),
                TextColumn::make('customer.name')->searchable(),
                TextColumn::make('paymentMethod.name')->searchable(),
                TextColumn::make('grand_total')->money('EGP'),
                TextColumn::make('created_at'),
            ]);
    }
}
