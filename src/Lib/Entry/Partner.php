<?php

namespace Obelaw\Accounting\Lib\Entry;

use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Model\AccountEntry;

class Partner
{
    public function __construct(
        public AccountEntry $entry
    ) {
    }

    public function debit($accountCode, $amount)
    {
        $account = Account::whereCode($accountCode)->first();

        $this->entry->amount()->create([
            'account_id' => $account->id,
            'type' => 'debit',
            'amount' => $amount,
        ]);

        return $this;
    }

    public function credit($accountCode, $amount)
    {
        $account = Account::whereCode($accountCode)->first();

        $this->entry->amount()->create([
            'account_id' => $account->id,
            'type' => 'credit',
            'amount' => $amount,
        ]);

        return $this;
    }
}
