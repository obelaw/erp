<?php

namespace Obelaw\Shipping\Filament\Resources;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\Shipping\Filament\Resources\CourierAccountResource\Pages;
use Obelaw\Shipping\Filament\Clusters\ShippingCluster;
use Obelaw\Shipping\Models\Courier;
use Obelaw\Shipping\Models\CourierAccount;

class CourierAccountResource extends Resource
{
    protected static ?string $model = CourierAccount::class;
    protected static ?string $cluster = ShippingCluster::class;
    protected static ?int $navigationSort = 77777;
    protected static ?string $navigationGroup = 'Configuration';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('courier_id')
                    ->label('Courier')
                    ->required()
                    ->options(Courier::pluck('name', 'id'))
                    ->searchable(),

                TextInput::make('name')
                    ->required(),

                KeyValue::make('credentials')
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('courier.name')->searchable(),
                TextColumn::make('name')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCourierAccounts::route('/'),
            'create' => Pages\CreateCourierAccount::route('/create'),
            'edit' => Pages\EditCourierAccount::route('/{record}/edit'),
        ];
    }
}
