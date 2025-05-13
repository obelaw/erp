<?php

namespace Obelaw\Accounting\Lib\Services;

use Illuminate\Support\Facades\DB;
use Obelaw\Accounting\Models\Transaction;
use Obelaw\Flow\Base\BaseService;

class JournalEntryService extends BaseService
{
    private $debits = null;
    private $credits = null;
    private $audit = null;

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

    public function createTransaction($addedOn = null, $description = null)
    {
        if (!$this->audit)
            throw new \Exception("You must use audit for this entry");

        DB::beginTransaction();

        try {
            $transaction = Transaction::create([
                'description' => $description,
                'added_at' => $addedOn ?? now(),
            ]);

            foreach ($this->debits->all() as $debit) {
                $transaction->journals()->create([
                    'account_id' => $debit['account_id'],
                    'type' => 'debit',
                    'amount' => $debit['amount'],
                ]);
            }

            foreach ($this->credits->all() as $credit) {
                $transaction->journals()->create([
                    'account_id' => $credit['account_id'],
                    'type' => 'credit',
                    'amount' => $credit['amount'],
                ]);
            }

            DB::commit();
            return $transaction;
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
