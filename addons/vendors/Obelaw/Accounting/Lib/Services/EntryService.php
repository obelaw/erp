<?php

namespace Obelaw\Accounting\Lib\Services;

use Illuminate\Support\Facades\DB;
// use Obelaw\Accounting\DTO\Entry\AmountEntryDTO;
// use Obelaw\Accounting\DTO\Entry\CreateEntryDTO;
use Obelaw\Accounting\Lib\Repositories\AccountRepositoryInterface;
use Obelaw\Accounting\Lib\Repositories\EntryRepositoryInterface;
use Obelaw\Framework\Base\ServiceBase;

class EntryService extends ServiceBase
{
    private $debits = null;
    private $credits = null;
    private $audit = null;

    public function __construct(
        public AccountRepositoryInterface $accountRepository,
        public EntryRepositoryInterface $entryRepository,
    ) {
    }

    // public function create(CreateEntryDTO $createEntryDTO)
    // {
    //     return $this->entryRepository->store($createEntryDTO->getData());
    // }

    // public function debit(AmountEntryDTO $amountEntryDTO)
    // {
    //     $amountEntryDTO->entry->amount()->create([
    //         'account_id' => $amountEntryDTO->account_id,
    //         'type' => 'debit',
    //         'amount' => $amountEntryDTO->amount,
    //     ]);

    //     return $this;
    // }

    // public function credit(AmountEntryDTO $amountEntryDTO)
    // {
    //     $amountEntryDTO->entry->amount()->create([
    //         'account_id' => $amountEntryDTO->account_id,
    //         'type' => 'credit',
    //         'amount' => $amountEntryDTO->amount,
    //     ]);

    //     return $this;
    // }

    public function init()
    {
        $this->debits = collect();
        $this->credits = collect();

        return $this;
    }

    public function debitLine($accountId, $amount)
    {
        $this->debits->push([
            'account_id' => $accountId,
            'amount' => $amount,
        ]);
    }

    public function creditLine($accountId, $amount)
    {
        $this->credits->push([
            'account_id' => $accountId,
            'amount' => $amount,
        ]);
    }

    public function audit()
    {
        if ($this->debits->sum('amount') !== $this->credits->sum('amount'))
            throw new \Exception("amount is not eq");


        $this->audit = true;
        return $this;
    }

    public function create($addedOn = null, $description = null)
    {
        if (!$this->audit)
            throw new \Exception("You must use audit for this entry");

        DB::beginTransaction();

        try {
            $entry = $this->entryRepository->store([
                'added_on' => $addedOn ?? now(),
                'description' => $description,
            ]);

            foreach ($this->debits->all() as $debit) {
                $entry->amount()->create([
                    'account_id' => $debit['account_id'],
                    'type' => 'debit',
                    'amount' => $debit['amount'],
                ]);
            }

            foreach ($this->credits->all() as $credit) {
                $entry->amount()->create([
                    'account_id' => $credit['account_id'],
                    'type' => 'credit',
                    'amount' => $credit['amount'],
                ]);
            }

            DB::commit();
            return $entry;
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
