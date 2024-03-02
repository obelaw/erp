<?php

namespace Obelaw\Purchasing\Lib\DTOs;

use Obelaw\Framework\Support\DTO;

class InitItemsDTO extends DTO
{
    public function __construct(
        public $items,
    ) {
    }
}
