<?php

namespace Obelaw\Audit\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\Audit\Filament\Resources\SerialResource\ListSerial;
use Obelaw\Audit\Filament\Resources\SerialResource\ViewSerial;
use Obelaw\Audit\Models\Serial;

class SerialResource extends Resource
{
    protected static ?string $model = Serial::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Audit';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serial')->searchable(),
                TextColumn::make('barcode')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
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
            'index' => ListSerial::route('/'),
            'view' => ViewSerial::route('/{record}/view'),
        ];
    }
}
