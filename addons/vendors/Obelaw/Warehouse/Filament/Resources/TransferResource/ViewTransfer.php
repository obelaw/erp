<?php

namespace Obelaw\Warehouse\Filament\Resources\TransferResource;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Model;
use Obelaw\Warehouse\Actions\Transfer\TransferAction;
use Obelaw\Warehouse\Filament\Resources\TransferResource;
use Obelaw\Warehouse\Lib\Services\TransferService;

class ViewTransfer extends ViewRecord
{
    protected static string $resource = TransferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),

            Action::make('Approve')
                ->icon('heroicon-o-check')
                ->color(Color::Yellow)
                ->visible(function (Model $record) {
                    return TransferService::make()->canApprove($record);
                })
                ->requiresConfirmation()
                ->action(fn (Model $record) => TransferService::make()->approve($record)),

            Action::make('Transfer')
                ->icon('heroicon-o-check')
                ->color(Color::Green)
                ->visible(function (Model $record) {
                    return TransferService::make()->canTransfer($record);
                })
                ->requiresConfirmation()
                ->action(fn (Model $record) => TransferAction::make($record)),
        ];
    }
}
