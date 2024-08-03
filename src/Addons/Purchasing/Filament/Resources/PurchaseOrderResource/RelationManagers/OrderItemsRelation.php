<?php

namespace Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Catalog\Models\Product;
use Obelaw\Purchasing\Models\PurchaseOrderItem;

class OrderItemsRelation extends RelationManager
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
                    ->options(Product::pluck('name', 'id'))
                    ->afterStateUpdated(function (Set $set, $state) {
                        if ($state) {
                            $product = Product::find($state);
                            $set('product_id', $product->id);
                            $set('item_price', $product->price_purchase);
                            $set('row_total', $product->price_purchase);
                        }

                        if (!$state)
                            $set('product_id', null);
                    })
                    ->searchable()
                    ->columnSpan(3),

                TextInput::make('quantity')
                    ->label('Quantity')
                    ->required()
                    ->live()
                    ->numeric()
                    ->default(1)
                    ->afterStateUpdated(function (Get $get, Set $set, $state) {
                        $product = Product::find($get('product_id'));
                        $set('item_price', $product->price_purchase);
                        $set('row_total', $product->price_purchase * $state);
                    })
                    ->columnSpan(1),

                TextInput::make('item_price')
                    ->disabled()
                    ->dehydrated()
                    ->columnSpan(1),

                TextInput::make('row_total')
                    ->disabled()
                    ->dehydrated()
                    ->columnSpan(1),
            ])->columns(3);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')
                    ->searchable(),

                TextColumn::make('quantity')
                    ->label('quantity')
                    ->summarize(Sum::make()->label(null))
                    ->alignCenter(),

                ColumnGroup::make('Prices', [
                    TextColumn::make('item_price')
                        ->label('Purchase Price')
                        ->alignCenter(),

                    TextColumn::make('row_total')
                        ->summarize(Sum::make()->label('Total Price'))
                        ->label('Total Price')
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
                CreateAction::make()
                    ->label('Add New Item')
                    ->disabled(fn (RelationManager $livewire): bool => $livewire->ownerRecord->status != 1),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->groupedBulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
