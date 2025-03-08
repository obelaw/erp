<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\ERP\Addons\Warehouse\Filament\Clusters\WarehouseCluster;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\InventoryResource\CreateInventory;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\InventoryResource\ListInventory;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\InventoryResource\ViewInventory;
use Obelaw\ERP\Addons\Warehouse\Filament\Resources\RelationManagers\ItemsRelationManager;
use Obelaw\ERP\Addons\Warehouse\Models\Place\Inventory;
use Obelaw\ERP\Addons\Warehouse\Models\Place\Warehouse;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Traits\PremitCan;

#[Permissions(
    id: 'permit.warehouse.inventory.viewAny',
    title: 'Inventory',
    description: 'Access on inventory at warehouse',
    permissions: [
        'permit.warehouse.inventory.create' => 'Can Create',
        'permit.warehouse.inventory.edit' => 'Can Edit',
        'permit.warehouse.inventory.delete' => 'Can Delete',
    ]
)]
class InventoryResource extends Resource
{
    use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.warehouse.inventory.viewAny',
        'can_create' => 'permit.warehouse.inventory.create',
        'can_edit' => 'permit.warehouse.inventory.edit',
        'can_delete' => 'permit.warehouse.inventory.delete',
    ];

    protected static ?string $model = Inventory::class;
    protected static ?string $cluster = WarehouseCluster::class;
    protected static ?string $navigationGroup = 'Places';
    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('place_id')
                    ->label('Warehouse')
                    ->required()
                    ->options(Warehouse::all()->pluck('name', 'id'))
                    ->searchable(),

                TextInput::make('name')
                    ->label('Name')
                    ->required(),

                TextInput::make('code')
                    ->label('Code')
                    ->required(),

                TextInput::make('description')
                    ->label('Description'),

                TextInput::make('address')
                    ->label('Address'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('warehouse.name')->label('Warehouse'),
                TextColumn::make('code')->label('Code'),
                TextColumn::make('name')->label('Name'),
            ])
            ->filters([
                //
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
            ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInventory::route('/'),
            'create' => CreateInventory::route('/create'),
            'view' => ViewInventory::route('/{record}/view'),
            // 'edit' => EditCustomerAddress::route('/{record}/edit'),
        ];
    }
}
