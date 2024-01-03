<?php

namespace Obelaw\Accounting\DTO\PriceList;

use Obelaw\Framework\Support\DTO;

class CreatePriceListDTO extends DTO
{
    public function __construct(
        public string $name,
        public string $code,
        public string|null $start_date = null,
        public string|null $end_date = null,
    ) {
    }
}
