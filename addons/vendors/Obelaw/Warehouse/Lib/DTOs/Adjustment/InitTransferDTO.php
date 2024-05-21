<?php

namespace Obelaw\Warehouse\Lib\DTOs\Adjustment;

use Obelaw\Framework\Support\DTO;

class InitTransferDTO extends DTO
{
    public function __construct(
        public int|null $inventory_from,
        public int $inventory_to,
        public int $type,
        public string|null $description,
    ) {
    }
}
