<?php

namespace Obelaw\Accounting\Lib\Services;

use Obelaw\Accounting\Lib\Repositories\AccountRepositoryInterface;
use Obelaw\Accounting\Lib\Repositories\EntryRepositoryInterface;
use Obelaw\Framework\Base\ServiceBase;

class EntryService extends ServiceBase
{
    public function __construct(
        public AccountRepositoryInterface $accountRepository,
        public EntryRepositoryInterface $entryRepository,
    ) {
    }

    public function create($added_on, string $description = null)
    {
        return $this->entryRepository->store([
            'description' => $description,
            'added_on' => $added_on,
        ]);
    }

    public function debit($entry, $accountId, $amount)
    {
        $entry->amount()->create([
            'account_id' => $accountId,
            'type' => 'debit',
            'amount' => $amount,
        ]);

        return $this;
    }

    public function credit($entry, $accountId, $amount)
    {
        $entry->amount()->create([
            'account_id' => $accountId,
            'type' => 'credit',
            'amount' => $amount,
        ]);

        return $this;
    }
}
