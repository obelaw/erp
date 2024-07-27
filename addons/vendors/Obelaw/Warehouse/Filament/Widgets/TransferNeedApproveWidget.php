<?php

namespace Obelaw\Warehouse\Filament\Widgets;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Obelaw\Warehouse\Enums\TransferStatus;
use Obelaw\Warehouse\Models\Transfer;

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
            ]);
    }
}
