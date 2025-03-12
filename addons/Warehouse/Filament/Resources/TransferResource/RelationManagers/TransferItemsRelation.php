<?php

namespace Obelaw\Warehouse\Filament\Resources\TransferResource\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\Catalog\Models\Product;

class TransferItemsRelation extends RelationManager
{
    protected static ?string $title = 'Items';
    protected static ?string $icon = 'heroicon-o-archive-box';
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->label('Product')
                    ->required()
                    ->live()
                    ->options(Product::all()->pluck('name', 'id')),

                TextInput::make('quantity')
                    ->label('Quantity')
                    ->required()
                    ->numeric(),
            ]);
    }


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
                CreateAction::make()
                    ->label('Add Item'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->groupedBulkActions([
                // 
            ]);
    }
}
