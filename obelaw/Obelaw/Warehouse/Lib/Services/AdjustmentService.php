<?php

namespace Obelaw\Warehouse\Lib\Services;


use Obelaw\Catalog\Enums\ProductType;
use Obelaw\Framework\Base\ServiceBase;
use Obelaw\Warehouse\Lib\DTOs\Adjustment\InitAdjustmentDTO;
use Obelaw\Warehouse\Lib\Repositories\AdjustmentRepositoryInterface;

class AdjustmentService extends ServiceBase
{
    public function __construct(
        public AdjustmentRepositoryInterface $adjustmentRepository,
    ) {
    }

    public function new(InitAdjustmentDTO $initAdjustmentDTO)
    {
        $adjustment = $this->adjustmentRepository->store($initAdjustmentDTO->getData());

        if (!$adjustment)
            return false;

        if ($adjustment->product->product_type == ProductType::CONSUMABLE->value) {
            // TODO Need More Code
            $adjustment->inventoryItem()->create([
                'place_id' => $adjustment['place_id'],
                'product_id' => $adjustment['product_id'],
                'quantity' => $adjustment['quantity'],
            ]);
        }

        if ($adjustment->product->product_type == ProductType::STORABLE->value) {
            for ($x = 1; $x <= $adjustment['quantity']; $x++) {
                $adjustment->inventoryItem()->create([
                    'place_id' => $adjustment['place_id'],
                    'product_id' => $adjustment['product_id'],
                ]);
            }
        }
    }
}
