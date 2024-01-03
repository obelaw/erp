<?php

namespace Obelaw\Accounting\DTO\Account;

use Obelaw\Framework\Support\DTO;

class GetAccountByCodeDTO extends DTO
{
    public function __construct(
        public string $code,
    ) {
    }
}
