<?php

namespace Obelaw\Sales\Filament\Resources\CouponResource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Obelaw\Sales\Filament\Resources\CouponResource;

class ListCoupon extends ListRecords
{
    protected static string $resource = CouponResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
