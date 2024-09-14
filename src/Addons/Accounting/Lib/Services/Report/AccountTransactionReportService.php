<?php

namespace Obelaw\ERP\Addons\Accounting\Lib\Services\Report;

use Illuminate\Support\Carbon;
use Obelaw\ERP\Addons\Accounting\Lib\TDO\AccountTransactionDTO;
use Obelaw\ERP\Addons\Accounting\Models\Account;
use Obelaw\ERP\Base\BaseService;

class AccountTransactionReportService extends BaseService
{
    private int $currentBalance = 0;
    private array $accountTransactions = [];

    public function setAccount(Account $account, string|Carbon $startOfPeriod = null, string|Carbon $endOfPeriod = null)
    {
        $journalEntries = $account->entries()->whereHas('transaction', function ($query) use ($startOfPeriod, $endOfPeriod) {
            return $query->isPosted()->whereBetween('added_at', [$startOfPeriod ?? now()->startOfMonth(), $endOfPeriod ?? now()->endOfMonth()]);
        })->get();

        $journalTotalEntries = $account->entries()->whereHas('transaction', function ($query) use ($startOfPeriod) {
            return $query->isPosted()->where('added_at', '<=', $startOfPeriod ?? now()->startOfMonth());
        })->get();

        $openBalance = 0;

        foreach ($journalTotalEntries as $journalTotalEntry) {
            $openBalance += $journalTotalEntry->amount_debit - $journalTotalEntry->amount_credit;
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

            $currentBalance += $journalEntry->amount_debit - $journalEntry->amount_credit;

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
