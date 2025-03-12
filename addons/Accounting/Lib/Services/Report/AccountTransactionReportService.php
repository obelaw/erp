<?php

namespace Obelaw\Accounting\Lib\Services\Report;

use Illuminate\Support\Carbon;
use Obelaw\Accounting\Lib\TDO\AccountTransactionDTO;
use Obelaw\Accounting\Models\Account;
use Obelaw\ERP\Base\BaseService;

class AccountTransactionReportService extends BaseService
{
    private int $currentBalance = 0;
    private array $accountTransactions = [];

    public function setAccount(Account $account, string|Carbon $startOfPeriod = null, string|Carbon $endOfPeriod = null)
    {
        $nature = $account->type->nature ?? $account->type->parent->nature ?? 'debit';

        $journalEntries = $account->entries()->whereHas('transaction', function ($query) use ($startOfPeriod, $endOfPeriod) {
            $query->isPosted()->whereBetween('added_at', [$startOfPeriod ?? now()->startOfMonth(), $endOfPeriod ?? now()->endOfMonth()]);
        })->get();

        $journalTotalEntries = $account->entries()->whereHas('transaction', function ($query) use ($startOfPeriod) {
            $query->isPosted()->where('added_at', '<', $startOfPeriod ?? now()->startOfMonth());
        })->get();

        $openBalance = $account->opening_balance;

        foreach ($journalTotalEntries as $journalTotalEntry) {
            $openBalance += ($nature == 'debit') ? $journalTotalEntry->amount_debit - $journalTotalEntry->amount_credit : $journalTotalEntry->amount_credit - $journalTotalEntry->amount_debit;
        }

        $accountTransactions = [];

        $currentBalance = $openBalance;

        $accountTransactions[] = new AccountTransactionDTO(
            '',
            'Open Balance',
            null,
            null,
            balance: $openBalance,
        );

        foreach ($journalEntries as $journalEntry) {

            $currentBalance += ($nature == 'debit') ? $journalEntry->amount_debit - $journalEntry->amount_credit : $journalEntry->amount_credit - $journalEntry->amount_debit;

            $accountTransactions[] = new AccountTransactionDTO(
                $journalEntry->transaction->added_at,
                $journalEntry->transaction->description ?? '',
                $journalEntry->amount_debit,
                $journalEntry->amount_credit,
                $currentBalance,
            );
        }

        $this->currentBalance = $currentBalance;
        $this->accountTransactions = $accountTransactions;

        return $this;
    }

    public function getTransactions(): array
    {
        return $this->accountTransactions;
    }

    public function getCurrentBalance(): int
    {
        return $this->currentBalance;
    }
}
