<?php

namespace Obelaw\Shipping\Filament\Resources\DeliveryOrderResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Obelaw\Shipping\Models\CourierAccount;

class AWBsRelation extends RelationManager
{
    protected static ?string $title = 'AWBs';
    protected static ?string $icon = 'heroicon-o-archive-box';
    protected static string $relationship = 'AWBs';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.account.courier.name')
                    ->label('Courier'),

                TextColumn::make('order.account.name')
                    ->label('Account'),

                TextColumn::make('awb')
                    ->label('AWB')
                    ->searchable(),

                TextColumn::make('courier_status')
                    ->label('Courier Status'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Action::make('updateTracking')
                    ->label('Update Tracking')
                    ->action(function ($record) {
                        $classInstance = new $record->order->account->courier->class_instance($record->order->account, $record->order);
                        return $classInstance->doTracking($record);
                    }),

                Action::make('PrintLabel')
                    ->label('Print Label')
                    ->action(function ($record) {
                        $classInstance = new $record->order->account->courier->class_instance($record->order->account, $record->order);
                        return $classInstance->doPrintLabel($record);
                    }),

                Action::make('cancel')
                    ->label('Cancel')
                    ->action(function ($record) {
                        $classInstance = new $record->order->account->courier->class_instance($record->order->account, $record->order);
                        return $classInstance->doCancel($record);
                    }),
            ])
            ->groupedBulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
