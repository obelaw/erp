<?php

namespace Obelaw\Warehouse\Filament\Resources;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\Catalog\Models\Product;
use Obelaw\ERP\ERPManager;
use Obelaw\Warehouse\Enums\TransferStatus;
use Obelaw\Warehouse\Enums\TransferType;
use Obelaw\Warehouse\Filament\Resources\TransferResource\CreateTransfer;
use Obelaw\Warehouse\Filament\Resources\TransferResource\EditTransfer;
use Obelaw\Warehouse\Filament\Resources\TransferResource\ListTransfer;
use Obelaw\Warehouse\Filament\Resources\TransferResource\ViewTransfer;
use Obelaw\Warehouse\Models\Place\Inventory;
use Obelaw\Warehouse\Models\Transfer;

class TransferResource extends Resource
{
    protected static ?string $model = Transfer::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    protected static ?string $navigationGroup = 'Warehouses';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        Select::make('inventory_from')
                            ->required()
                            ->options(Inventory::all()->pluck('name', 'id'))
                            ->searchable(),

                        Select::make('inventory_to')
                            ->required()
                            ->options(Inventory::all()->pluck('name', 'id'))
                            ->searchable(),

                        Select::make('type')
                            ->required()
                            ->options(TransferType::class)
                            ->searchable(),

                        Textarea::make('description')
                            ->required()
                            ->autosize(),
                    ]),
                    Section::make([
                        Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Select::make('product_id')
                                    ->label('Product')
                                    ->required()
                                    ->options(Product::all()->pluck('name', 'id'))
                                    ->searchable(),
                                TextInput::make('quantity')->required(),
                            ])
                            ->columns(2)
                    ])->grow(false),
                ])->from('md'),




            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('inventoryFrom.name'),

                TextColumn::make('inventoryTo.name'),

                TextColumn::make('status')
                    ->badge()
                    ->alignCenter()
                    ->state(function (Transfer $record): string {
                        return match ($record->status) {
                            TransferStatus::DRAFT() => 'Draft',
                            TransferStatus::WAITING() => 'Waiting',
                            TransferStatus::READY() => 'Ready',
                            TransferStatus::DONE() => 'Done',
                        };
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'Draft' => 'gray',
                        'Waiting' => 'warning',
                        'Ready' => 'success',
                        'Done' => 'danger',
                    }),

                TextColumn::make('created_at'),
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
            'index' => ListTransfer::route('/'),
            'create' => CreateTransfer::route('/create'),
            'view' => ViewTransfer::route('/{record}/view'),
            'edit' => EditTransfer::route('/{record}/edit'),
        ];
    }
}
