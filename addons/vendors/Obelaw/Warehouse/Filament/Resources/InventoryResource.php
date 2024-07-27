<?php

namespace Obelaw\Warehouse\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\ERP\ERPManager;
use Obelaw\Warehouse\Filament\Resources\InventoryResource\CreateInventory;
use Obelaw\Warehouse\Filament\Resources\InventoryResource\ListInventory;
use Obelaw\Warehouse\Filament\Resources\InventoryResource\ViewInventory;
use Obelaw\Warehouse\Filament\Resources\RelationManagers\ItemsRelationManager;
use Obelaw\Warehouse\Models\Place\Inventory;
use Obelaw\Warehouse\Models\Place\Warehouse;

class InventoryResource extends Resource
{
    protected static ?string $model = Inventory::class;
    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationGroup = 'Warehouses';
    protected static ?string $navigationParentItem = 'Warehouses';

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
            ->actions(
                ERPManager::tableActions()
                    ->exclude(['edit'])
                    ->make()
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
