<?php

namespace Obelaw\ERP\Addons\Catalog\Filament\Resources;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Catalog\Enums\ProductScope;
use Obelaw\ERP\Addons\Catalog\Enums\ProductType;
use Obelaw\ERP\Addons\Catalog\Filament\Clusters\CatalogCluster;
use Obelaw\ERP\Addons\Catalog\Filament\Resources\ProductResource\ListProduct;
use Obelaw\ERP\Addons\Catalog\Models\Catagory;
use Obelaw\ERP\Addons\Catalog\Models\Product;

class ProductResource extends Resource
{
    protected static ?int $navigationSort = 1;
    protected static ?string $cluster = CatalogCluster::class;
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('catagory_id')
                    ->label('Catagory')
                    ->options(Catagory::all()->pluck('name', 'id'))
                    ->searchable(),

                Select::make('product_type')
                    ->options(ProductType::class)
                    ->required(),

                Select::make('product_scope')
                    ->options(ProductScope::class)
                    ->required(),

                TextInput::make('name')
                    ->required(),

                TextInput::make('sku')
                    ->label('SKU')
                    ->required(),

                Fieldset::make('Product Can')
                    ->schema([
                        Toggle::make('can_sold'),
                        Toggle::make('can_purchased'),
                    ])->columns(1),

                Fieldset::make('Product Price')
                    ->schema([
                        TextInput::make('price_sales'),
                        TextInput::make('price_purchase'),
                    ])->columns(1),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serials.serial')
                    ->searchable()
                    ->default('unserial'),
                TextColumn::make('catagory.name')
                    ->label('Catagory')
                    ->default('uncategory'),
                TextColumn::make('product_type')
                    ->state(function (Product $record): string {
                        return match ($record->product_scope) {
                            ProductType::CONSUMABLE() => 'Consumable',
                            ProductType::SERVICE() => 'Service',
                            ProductType::STORABLE() => 'Storable',
                            default => 'Need to Set',
                        };
                    }),
                TextColumn::make('product_scope')
                    ->state(function (Product $record): string {
                        return match ($record->product_scope) {
                            ProductScope::RAW_MATERIAL() => 'Raw Material',
                            ProductScope::SEMI_FINISHED() => 'Semi Finished',
                            ProductScope::FINISHED() => 'Finished',
                            default => 'Need to Set',
                        };
                    }),
                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                TextColumn::make('name'),
                ColumnGroup::make('Product Can', [
                    IconColumn::make('can_sold')
                        ->label('Sold')
                        ->boolean()
                        ->tooltip('price_sales')
                        ->alignCenter(),
                    IconColumn::make('can_purchased')
                        ->label('Purchased')
                        ->boolean()
                        ->alignCenter(),
                ])->alignCenter(),
            ])
            ->filters([
                SelectFilter::make('product_type')
                    ->multiple()
                    ->options(ProductType::class),
                SelectFilter::make('product_scope')
                    ->multiple()
                    ->options(ProductScope::class),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProduct::route('/'),
            // 'create' => CreateProduct::route('/create'),
            // 'edit' => EditCustomerAddress::route('/{record}/edit'),
        ];
    }
}
