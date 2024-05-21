<?php

namespace Obelaw\Accounting\DTO\Account;

use Obelaw\Framework\Support\DTO;

class GetAccountByIdDTO extends DTO
{
    public function __construct(
        public int $id,
    ) {
    }
}
