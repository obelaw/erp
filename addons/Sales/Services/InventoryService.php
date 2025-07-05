<?php

namespace Obelaw\Sales\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Obelaw\Catalog\Enums\StockType;
use Obelaw\Flow\Base\BaseService;
use Obelaw\Sales\Models\SalesFlatOrder;
use Obelaw\Warehouse\Enums\PlaceItemStatus;
use Obelaw\Warehouse\Models\Place\Inventory;
use Obelaw\Warehouse\Models\PlaceItem;

class InventoryService extends BaseService
{
    public function getSalePlaces(): Collection
    {
        return Inventory::pluck('name', 'id');
    }

    public function doSalesOrder(SalesFlatOrder $salesFlatOrder)
    {
        if ($this->checkSalesOrder($salesFlatOrder)) {
            throw new \Exception('Inventory item already exists for this sales order place.');
        }

        $this->processSalesOrder($salesFlatOrder);
    }

    public function processSalesOrder(SalesFlatOrder $salesFlatOrder)
    {
        DB::beginTransaction();

        try {
            // todo check backorder
            foreach ($salesFlatOrder->items as $item) {
                foreach (range(1, $item->quantity) as $i) {

                    $reference = $this->getReference($salesFlatOrder);

                    $inventoryItem = $salesFlatOrder->inventoryItem()->create([
                        'reference_id' => $reference->id,
                        'place_id' => $salesFlatOrder->sale_place_id,
                        'product_id' => $item->product->id,
                        'status' => PlaceItemStatus::OUT,
                    ]);

                    $reference->reference_id = $inventoryItem->id;
                    $reference->saveQuietly();
                }
            }
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle exception if needed, e.g., log it
        }
    }

    public function checkSalesOrder(SalesFlatOrder $salesFlatOrder)
    {
        return $salesFlatOrder->inventoryItem()->where('place_id', $salesFlatOrder->sale_place_id)->exists();
    }

    public function getReference(SalesFlatOrder $salesFlatOrder)
    {
        return PlaceItem::whereNull('reference_id')->where('place_id', $salesFlatOrder->sale_place_id)->first();
    }
}
