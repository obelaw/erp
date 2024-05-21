<?php

namespace Obelaw\Warehouse\Lib\DTOs\Adjustment;

use Obelaw\Framework\Support\DTO;

class InitAdjustmentDTO extends DTO
{
    public function __construct(
        public int $place_id,
        public int $product_id,
        public int $quantity,
        public string $description,
    ) {
    }
}
