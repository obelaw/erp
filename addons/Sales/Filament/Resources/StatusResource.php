<?php

namespace Obelaw\Sales\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\Sales\Filament\Resources\StatusResource\Pages;
use Obelaw\Sales\Filament\Clusters\SalesCluster;
use Obelaw\Sales\Models\OrderStatus;

class StatusResource extends Resource
{
    protected static ?string $model = OrderStatus::class;
    protected static ?string $cluster = SalesCluster::class;
    protected static ?int $navigationSort = 77777;
    protected static ?string $navigationGroup = 'Configuration';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatuses::route('/'),
        ];
    }
}
