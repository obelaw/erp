<?php

namespace Obelaw\Accounting\Support;

use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Model\AccountEntry;

class COA
{
    public static function entry($creditCode, $debitCode, $amount, $description, $added_on)
    {
        $creditAccount = Account::whereCode($creditCode)->first();

        $debitAccount = Account::whereCode($debitCode)->first();

        $entry = AccountEntry::create([
            'credit_account_id' => $creditAccount->id,
            'debit_account_id' => $debitAccount->id,
            'description' => $description,
            'added_on' => $added_on,
        ]);

        $entry->amount()->create([
            'credit_amount' => $amount,
            'debit_amount' => $amount,
        ]);
    }
}
