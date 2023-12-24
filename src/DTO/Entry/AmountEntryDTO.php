<?php

namespace Obelaw\Accounting\DTO\Entry;

use Obelaw\Accounting\Model\AccountEntry;
use Obelaw\Framework\Support\DTO;

class AmountEntryDTO extends DTO
{
    public function __construct(
        public AccountEntry $entry,
        public int $account_id,
        public float $amount,
    ) {
    }
}
