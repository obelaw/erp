<?php

namespace Obelaw\ERP\Addons\Warehouse\Filament\Resources\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Obelaw\ERP\Addons\Catalog\Models\Product;
use Obelaw\ERP\Addons\Warehouse\Enums\PlaceItemStatus;
use Obelaw\ERP\Addons\Warehouse\Models\PlaceItem;

class ItemsRelationManager extends RelationManager
{
    protected static ?string $title = 'Items in this stock';
    protected static ?string $icon = 'heroicon-o-archive-box';
    protected static string $relationship = 'items';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name'),

                TextColumn::make('serials.serial')
                    ->label('Serial')
                    ->searchable(),

                TextColumn::make('serials.barcode')
                    ->label('Barcode')
                    ->searchable(),

                TextColumn::make('status')
                    ->badge()
                    ->alignCenter()
                    ->state(function (PlaceItem $record): string {
                        return match ($record->status) {
                            PlaceItemStatus::IN->value => 'IN',
                            PlaceItemStatus::OUT->value => 'OUT',
                        };
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'IN' => 'success',
                        'OUT' => 'danger',
                    }),
            ])
            ->filters([
                SelectFilter::make('product_id')
                    ->label('Product')
                    ->options(fn (): array => Product::query()->pluck('name', 'id')->all())
                    ->searchable()
                    ->preload(),
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // filament.erp-o.resources.serials.view


                Action::make('View')
                    ->icon('heroicon-o-eye')
                    ->color(Color::Gray)
                    ->url(fn (Model $record) => route('filament.erp-o.resources.serials.view', $record)),

                // ->action(fn (Model $record) => route('filament.erp-o.resources.serials.view', $record)),
                // ViewAction::make(),
            ])
            ->groupedBulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
