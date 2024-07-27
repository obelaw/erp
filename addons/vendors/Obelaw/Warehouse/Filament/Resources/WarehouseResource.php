<?php

namespace Obelaw\Warehouse\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\ERP\ERPManager;
use Obelaw\Warehouse\Filament\Resources\WarehouseResource\ListWarehouse;
use Obelaw\Warehouse\Models\Place\Warehouse;

class WarehouseResource extends Resource
{
    protected static ?string $model = Warehouse::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    protected static ?string $navigationGroup = 'Warehouses';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                TextColumn::make('code')->label('Code'),
                TextColumn::make('name')->label('Name'),
            ])
            ->filters([
                //
            ])
            ->actions(
                ERPManager::tableActions()
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWarehouse::route('/'),
            // 'create' => CreateCustomerAddress::route('/create'),
            // 'edit' => EditCustomerAddress::route('/{record}/edit'),
        ];
    }
}
