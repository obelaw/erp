<?php

namespace Obelaw\ERP\Addons\Warehouse\Lib\Services;

use Obelaw\ERP\Addons\Catalog\Enums\ProductType;
use Obelaw\ERP\Base\BaseService;
use Obelaw\Warehouse\Lib\DTOs\Adjustment\InitAdjustmentDTO;
use Obelaw\Warehouse\Lib\Repositories\AdjustmentRepositoryInterface;

class AdjustmentService extends BaseService
{
    // public function __construct(
    //     public AdjustmentRepositoryInterface $adjustmentRepository,
    // ) {
    // }

    public function new($productId)
    {
        // $adjustment = $this->adjustmentRepository->store($initAdjustmentDTO->getData());

        if (!$adjustment)
            return false;

        // if ($adjustment->product->product_type == ProductType::CONSUMABLE->value) {
        //     // TODO Need More Code
        //     $adjustment->inventoryItem()->create([
        //         'place_id' => $adjustment['place_id'],
        //         'product_id' => $adjustment['product_id'],
        //         'quantity' => $adjustment['quantity'],
        //     ]);
        // }

        if ($product->product_type == ProductType::STORABLE->value) {
            foreach (range(1, $adjustment['quantity']) as $index) {
                $adjustment->inventoryItem()->create([
                    'place_id' => $adjustment['place_id'],
                    'product_id' => $adjustment['product_id'],
                ]);
            }
        }

        return $adjustment;
    }
}