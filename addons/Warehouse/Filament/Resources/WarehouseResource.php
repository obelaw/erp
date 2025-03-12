<?php

namespace Obelaw\Warehouse\Filament\Resources;

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
use Obelaw\Warehouse\Filament\Clusters\WarehouseCluster;
use Obelaw\Warehouse\Filament\Resources\WarehouseResource\ListWarehouse;
use Obelaw\Warehouse\Models\Place\Warehouse;
use Obelaw\Permit\Attributes\Permissions;
use Obelaw\Permit\Traits\PremitCan;

#[Permissions(
    id: 'permit.warehouse.warehouse.viewAny',
    title: 'Warehouses',
    description: 'Access on warehouses at warehouse',
    permissions: [
        'permit.warehouse.warehouse.create' => 'Can Create',
        'permit.warehouse.warehouse.edit' => 'Can Edit',
        'permit.warehouse.warehouse.delete' => 'Can Delete',
    ]
)]
class WarehouseResource extends Resource
{
    use PremitCan;

    protected static ?array $canAccess = [
        'can_viewAny' => 'permit.warehouse.warehouse.viewAny',
        'can_create' => 'permit.warehouse.warehouse.create',
        'can_edit' => 'permit.warehouse.warehouse.edit',
        'can_delete' => 'permit.warehouse.warehouse.delete',
    ];

    protected static ?string $model = Warehouse::class;
    protected static ?string $cluster = WarehouseCluster::class;
    protected static ?string $navigationGroup = 'Places';
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

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
            'index' => ListWarehouse::route('/'),
        ];
    }
}
