<?php

namespace Obelaw\Sales\Filament\Resources\InvoiceResource;

use Exception;
use Filament\Actions\Action;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;
use Obelaw\Sales\Filament\Resources\InvoiceResource;
use Obelaw\Sales\Lib\Services\InvoiceService;
use Obelaw\Sales\Models\SalesInvoice;
use Obelaw\Permit\Facades\Permit;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('postInvoice')
                ->hidden(!Permit::can('permit.sales.invoice.post'))
                ->disabled(fn(SalesInvoice $record) => $record->transaction_id)
                ->requiresConfirmation()
                ->label('Post Invoice')
                ->color(Color::Green)
                ->action(action: function (SalesInvoice $record): void {
                    try {
                        InvoiceService::make()->post($record);
                    } catch (Exception $e) {
                        Notification::make()
                            ->danger()
                            ->title('Post Invoice')
                            ->body($e->getMessage())
                            ->send();
                    }
                }),

            Action::make('printInvoice')
                ->label('Print Invoice')
                ->action(action: function ($livewire, SalesInvoice $record) {
                    // dd($record);

                    $livewire->js('window.open("' . route('obelaw.invoices.print', [$record]) . '");');
                }),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')->tabs([
                    Tabs\Tab::make('Order Invoice')
                        ->icon('heroicon-m-user')
                        ->schema([
                            TextEntry::make('serials.serial')
                                ->label('Serial'),

                            TextEntry::make('order.grand_total')
                                ->label('Grand Total')
                                ->money('EGP'),

                            TextEntry::make('status')
                                ->label('Status'),
                        ])->columns(1),
                ]),
            ])->columns(1);
    }
}
