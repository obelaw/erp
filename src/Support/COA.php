<?php

namespace Obelaw\Accounting\Support;

use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Model\AccountEntry;

class COA
{
    public static function entry($debitCode, $creditCode, $amount, $description, $added_on)
    {
        $debitAccount = Account::whereCode($debitCode)->first();

        $creditAccount = Account::whereCode($creditCode)->first();

        $entry = AccountEntry::create([
            'description' => $description,
            'added_on' => $added_on,
        ]);

        // debit
        $entry->amount()->create([
            'account_id' => $debitAccount->id,
            'type' => 'debit',
            'amount' => $amount,
        ]);

        // credit
        $entry->amount()->create([
            'account_id' => $creditAccount->id,
            'type' => 'credit',
            'amount' => $amount,
        ]);
    }
}
