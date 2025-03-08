<?php

namespace Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;
use Obelaw\ERP\Addons\Purchasing\Filament\Resources\PurchaseOrderResource;
use Obelaw\ERP\Addons\Purchasing\Lib\Enums\POStatusEnum;
use Obelaw\ERP\Addons\Warehouse\Models\Place\Inventory;

class ViewPurchaseOrder extends ViewRecord
{
    protected static string $resource = PurchaseOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('receive')
                ->color(Color::Green)
                ->label('Receive')
                ->form([
                    Select::make('place_id')
                        ->label('Inventory')
                        ->options(Inventory::query()->pluck('name', 'id'))
                        ->required(),
                ])
                ->action(function (array $data, $record): void {

                    if ($record->status != POStatusEnum::DONE()) {
                        foreach ($record->items as $item) {
                            foreach (range(1, $item->quantity) as $index) {
                                $record->inventoryItem()->create([
                                    'place_id' => $data['place_id'],
                                    'product_id' => $item->product_id,
                                ]);
                            }
                        }

                        // Update status
                        $record->status = POStatusEnum::DONE();
                        $record->save();
                    }
                })
                ->visible(fn($record) => $record->status == POStatusEnum::PROCESSING()),

            Action::make('createBill')
                ->color(Color::Orange)
                ->label('Prepare Bill')
                ->action(function ($record): void {
                    // dd($record);
                    $record->status = POStatusEnum::PROCESSING();
                    $record->save();
                })
                ->visible(fn($record) => $record->status == POStatusEnum::QUOTATION()),

            EditAction::make()
                ->disabled(fn($record) => $record->status != POStatusEnum::QUOTATION()),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')->tabs([
                    Tabs\Tab::make('Vendor Information')
                        ->icon('heroicon-m-information-circle')
                        ->schema([
                            ImageEntry::make('vendor.image')
                                ->label('Image'),

                            TextEntry::make('vendor.name')
                                ->label('Vendor Name'),

                            TextEntry::make('vendor.phone')
                                ->label('Vendor Phone'),

                            TextEntry::make('vendor.email')
                                ->label('Vendor Email'),
                        ]),
                ]),
            ])->columns(1);
    }
}
