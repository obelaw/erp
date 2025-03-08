<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Catalog\Models\Product;
use Obelaw\ERP\Addons\Warehouse\Filament\Clusters\WarehouseCluster;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\AdjustmentResource\CreateAdjustment;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\AdjustmentResource\ListAdjustment;
use Obelaw\ERP\Addons\Warehouse\Models\Adjustment;
use Obelaw\ERP\Addons\Warehouse\Models\Place\Inventory;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Traits\PremitCan;

#[Permissions(
    id: 'permit.warehouse.adjustment.viewAny',
    title: 'Adjustments',
    description: 'Access on adjustments at warehouse',
    permissions: [
        'permit.warehouse.adjustment.create' => 'Can Create',
        'permit.warehouse.adjustment.edit' => 'Can Edit',
        'permit.warehouse.adjustment.delete' => 'Can Delete',
    ]
)]
class AdjustmentResource extends Resource
{
    use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.warehouse.adjustment.viewAny',
        'can_create' => 'permit.warehouse.adjustment.create',
        'can_edit' => 'permit.warehouse.adjustment.edit',
        'can_delete' => 'permit.warehouse.adjustment.delete',
    ];

    protected static ?string $model = Adjustment::class;
    protected static ?string $cluster = WarehouseCluster::class;
    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('place_id')
                    ->label('Inventory')
                    ->required()
                    ->options(Inventory::all()->pluck('name', 'id'))
                    ->searchable(),

                Select::make('product_id')
                    ->label('Product')
                    ->required()
                    ->options(Product::all()->pluck('name', 'id'))
                    ->searchable(),

                TextInput::make('quantity')->required(),

                Textarea::make('description')
                    ->required()
                    ->autosize(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')
                    ->description(fn(Adjustment $record): string => $record->description),

                TextColumn::make('inventory.name'),

                TextColumn::make('quantity'),

                TextColumn::make('created_at'),
            ])
            ->filters([
                //
            ])
            ->actions(
                [
                    ViewAction::make(),
                ]
            )
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
            'index' => ListAdjustment::route('/'),
            'create' => CreateAdjustment::route('/create'),
            // 'edit' => EditCustomerAddress::route('/{record}/edit'),
        ];
    }
}
