<?php

namespace Obelaw\Accounting\Lib\TDO;

class AccountTransactionDTO
{
    public function __construct(
        public string $date,
        public string $description,
        public float|null $debit,
        public float|null $credit,
        public string $balance,
    ) {}
}
