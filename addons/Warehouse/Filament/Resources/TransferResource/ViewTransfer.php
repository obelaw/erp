<?php

namespace Obelaw\Warehouse\Filament\Resources\TransferResource;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Model;
use Obelaw\Warehouse\Actions\Transfer\TransferAction;
use Obelaw\Warehouse\Enums\TransferStatus;
use Obelaw\Warehouse\Filament\Resources\TransferResource;
use Obelaw\Warehouse\Lib\Services\TransferService;
use Obelaw\Warehouse\Models\Transfer;

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
                ->action(fn(Model $record) => TransferService::make()->approve($record)),

            Action::make('Transfer')
                ->icon('heroicon-o-check')
                ->color(Color::Green)
                ->visible(function (Model $record) {
                    return TransferService::make()->canTransfer($record);
                })
                ->requiresConfirmation()
                ->action(fn(Model $record) => TransferAction::make($record)),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')->tabs([
                    Tabs\Tab::make('Transfer Information')
                        ->icon('heroicon-m-information-circle')
                        ->schema([
                            TextEntry::make('inventoryFrom.name')
                                ->label('Inventory From'),

                            TextEntry::make('inventoryTo.name')
                                ->label('Inventory To'),

                            TextEntry::make('type')
                                ->badge()
                                ->state(function (Transfer $record): string {
                                    return match ($record->status) {
                                        TransferStatus::DRAFT() => 'Draft',
                                        TransferStatus::WAITING() => 'Waiting',
                                        TransferStatus::READY() => 'Ready',
                                        TransferStatus::DONE() => 'Done',
                                    };
                                })
                                ->color(fn(string $state): string => match ($state) {
                                    'Draft' => 'gray',
                                    'Waiting' => 'warning',
                                    'Ready' => 'success',
                                    'Done' => 'danger',
                                }),

                            TextEntry::make('description'),
                        ]),
                ]),
            ])->columns(1);
    }
}
