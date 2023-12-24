<?php

namespace Obelaw\Accounting\Lib\Services;

use Obelaw\Accounting\DTO\Entry\AmountEntryDTO;
use Obelaw\Accounting\DTO\Entry\CreateEntryDTO;
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

    public function create(CreateEntryDTO $createEntryDTO)
    {
        return $this->entryRepository->store($createEntryDTO->getData());
    }

    public function debit(AmountEntryDTO $amountEntryDTO)
    {
        $amountEntryDTO->entry->amount()->create([
            'account_id' => $amountEntryDTO->account_id,
            'type' => 'debit',
            'amount' => $amountEntryDTO->amount,
        ]);

        return $this;
    }

    public function credit(AmountEntryDTO $amountEntryDTO)
    {
        $amountEntryDTO->entry->amount()->create([
            'account_id' => $amountEntryDTO->account_id,
            'type' => 'credit',
            'amount' => $amountEntryDTO->amount,
        ]);

        return $this;
    }
}
