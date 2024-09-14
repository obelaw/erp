<?php

namespace Obelaw\ERP\Addons\Accounting\Filament\Resources\TransactionResource;

use Exception;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;
use Obelaw\ERP\Addons\Accounting\Filament\Resources\TransactionResource;
use Obelaw\ERP\Addons\Accounting\Lib\Services\TransactionService;
use Obelaw\ERP\Addons\Accounting\Models\Transaction;

class ViewTransaction extends ViewRecord
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Post')
                ->icon('heroicon-o-check')
                ->color(Color::Green)
                ->visible(function (Transaction $record) {
                    return !TransactionService::make()->transaction($record)
                        ->posted();
                })
                ->requiresConfirmation()
                ->action(function (Transaction $record) {
                    try {
                        TransactionService::make()->transaction($record)
                            ->aduit()
                            ->post();
                    } catch (Exception $e) {
                        Notification::make()
                            ->title($e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),

            EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Information')
                            ->icon('heroicon-m-information-circle')
                            ->schema([
                                TextEntry::make('description'),
                                TextEntry::make('added_at'),
                            ]),
                    ])
            ])->columns(1);
    }
}
