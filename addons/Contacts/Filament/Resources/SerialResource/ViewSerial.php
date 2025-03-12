<?php

namespace Obelaw\Audit\Filament\Resources\SerialResource;

use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Obelaw\Audit\Filament\Resources\SerialResource;

class ViewSerial extends ViewRecord
{
    protected static string $resource = SerialResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')->tabs([
                    Tabs\Tab::make('Information')
                        ->icon('heroicon-m-information-circle')
                        ->schema([
                            TextEntry::make('year'),
                            TextEntry::make('serial'),
                            TextEntry::make('ulid'),
                            TextEntry::make('barcode'),
                        ]),
                ]),
            ])->columns(1);
    }
}
