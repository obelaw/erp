<?php

namespace Obelaw\Sales\Filament\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Columns\Summarizers\Range;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Obelaw\ERP\Addons\Catalog\Models\Product;
use Obelaw\Sales\Models\TempSalesOrderItem;
use Obelaw\Warehouse\Enums\PlaceItemStatus;
use Obelaw\Warehouse\Models\PlaceItem;

class OrderItemsRelation extends RelationManager
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

                TextColumn::make('item_quantity')
                    ->label('quantity')
                    ->summarize(Sum::make()->label(null))
                    ->alignCenter(),

                ColumnGroup::make('Prices', [

                    TextColumn::make('product.price_sales')
                        ->label('Price Sales')
                        ->alignCenter(),

                    TextColumn::make('price_row')
                        ->label('Price Row')
                        ->state(function (TempSalesOrderItem $record): float {
                            return $record->product->price_sales * $record->item_quantity;
                        })
                        ->alignCenter(),
                ])->alignCenter(),
            ])
            ->filters([
                SelectFilter::make('product_id')
                    ->label('Product')
                    ->options(fn (): array => Product::query()->pluck('name', 'id')->all())
                    ->searchable()
                    ->preload(),
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Action::make('View')
                //     ->icon('heroicon-o-eye')
                //     ->color(Color::Gray)
                //     ->url(fn (Model $record) => route('filament.erp-o.resources.serials.view', $record)),

            ])
            ->groupedBulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
