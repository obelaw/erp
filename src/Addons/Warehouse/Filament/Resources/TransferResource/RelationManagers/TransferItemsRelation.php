<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Resources\TransferResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransferItemsRelation extends RelationManager
{
    protected static ?string $title = 'Items';
    protected static ?string $icon = 'heroicon-o-archive-box';
    protected static string $relationship = 'items';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')
                    ->searchable(),

                TextColumn::make('quantity')
                    ->label('Quantity')
                    ->summarize(Sum::make()->label(null))
                    ->alignCenter(),

                // ColumnGroup::make('Prices', [
                //     TextColumn::make('product.price_sales')
                //         ->label('Price Sales')
                //         ->alignCenter(),
                //     TextColumn::make('price_row')
                //         ->label('Price Row')
                //         ->state(function (TempSalesOrderItem $record): float {
                //             return $record->product->price_sales * $record->item_quantity;
                //         })
                //         ->alignCenter(),
                // ])->alignCenter(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // 
            ])
            ->actions([
                // 
            ])
            ->groupedBulkActions([
                // 
            ]);
    }
}
