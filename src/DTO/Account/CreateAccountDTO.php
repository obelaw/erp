<?php

namespace Obelaw\Accounting\DTO\Account;

use Obelaw\Framework\Support\DTO;

class CreateAccountDTO extends DTO
{
    public function __construct(
        public int|null $parent_account = null,
        public string $name,
        public string $code,
        public string $type,
    ) {
    }
}
