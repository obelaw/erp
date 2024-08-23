<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Widgets;

use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Obelaw\ERP\Addons\Warehouse\Enums\TransferStatus;
use Obelaw\ERP\Addons\Warehouse\Models\Transfer;

class TransferNeedApproveWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $query = Transfer::query();
                $query->where('status', TransferStatus::DRAFT);
                return $query;
            })
            ->columns([
                TextColumn::make('inventoryFrom.name'),

                TextColumn::make('inventoryTo.name'),
                
                TextColumn::make('created_at'),
            ]);
    }
}
