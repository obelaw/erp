<?php

namespace Obelaw\Accounting\Filament\Resources\PriceListResource\RelationManagers;

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

class PriceListItemsRelation extends RelationManager
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
                    ->searchable()
                    ->required()
                    ->options(Product::pluck('name', 'id')),

                TextInput::make('price')->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')
                    ->searchable(),

                TextColumn::make('price')
                    ->label('Price')
                    ->alignCenter(),
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
