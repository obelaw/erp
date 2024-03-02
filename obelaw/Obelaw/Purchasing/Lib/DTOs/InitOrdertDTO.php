<?php

namespace Obelaw\Purchasing\Lib\DTOs;

use Obelaw\Framework\Support\DTO;

class InitOrdertDTO extends DTO
{
    public function __construct(
        public int $vendor_id,
        public string $cart_ulid,
        public float|null $sub_total = null,
        public float|null $tax_total = null,
        public float|null $grand_total = null,
    ) {
    }
}
