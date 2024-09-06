<?php

namespace Obelaw\ERP\Addons\Accounting\Lib\Services;

use Obelaw\ERP\Addons\Accounting\Models\Transaction;
use Obelaw\ERP\Base\BaseService;
use Obelaw\Permit\Facades\Permit;

class TransactionService extends BaseService
{
    private Transaction $transaction;
    private $aduit = false;

    public function transaction(Transaction $transaction)
    {
        $this->transaction = $transaction;

        return $this;
    }

    public function approved()
    {
        if (is_null($this->transaction->approve_by) || is_null($this->transaction->approve_at))
            return false;

        return true;
    }

    public function aduit()
    {
        throw_if(
            ($this->transaction->journals()->where('type', 'debit')->sum('amount') - $this->transaction->journals()->where('type', 'credit')->sum('amount')) != 0,
            'Debit and credit'
        );

        $this->aduit = true;

        return $this;
    }

    public function approve()
    {
        throw_if(
            !$this->aduit,
            'Must aduit'
        );

        $this->transaction->approve_by = Permit::user()->id;
        $this->transaction->approve_at = now();
        $this->transaction->save();
    }
}
