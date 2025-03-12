<?php

namespace Obelaw\Sales\Filament\Resources\SalesFlatOrderResource;

use Filament\Resources\Pages\EditRecord;
use Obelaw\Sales\Filament\Resources\SalesFlatOrderResource;
use Obelaw\Sales\Lib\Services\SalesOrderService;

class EditSalesFlatOrder extends EditRecord
{
    protected static string $resource = SalesFlatOrderResource::class;

    public function afterSave()
    {
        $order = SalesOrderService::make()
            ->order($this->getRecord());

        $order->saveTotals();
    }
}
