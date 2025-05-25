<?php

namespace Obelaw\Sales\Services;

use Illuminate\Support\Collection;
use Obelaw\Flow\Base\BaseService;
use Obelaw\Sales\Models\SalesFlatOrder;
use Obelaw\Warehouse\Models\Place\Inventory;

class InventoryService extends BaseService
{
    public function getSalePlaces(): Collection
    {
        return Inventory::pluck('name', 'id');
    }

    public function doSalesOrder(SalesFlatOrder $salesFlatOrder)
    {
        //
    }
}
