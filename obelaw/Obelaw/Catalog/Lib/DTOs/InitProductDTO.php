<?php

namespace Obelaw\Catalog\Lib\DTOs;

use Obelaw\Framework\Support\DTO;

class InitProductDTO extends DTO
{
    public function __construct(
        public int|null $catagory_id = null,
        public int $product_type,
        public string $name,
        public string $sku,
        public bool|null $can_sold,
        public bool|null $can_purchased,
        public float|null $price_sales,
        public float|null $price_purchase,
    ) {
    }
}
