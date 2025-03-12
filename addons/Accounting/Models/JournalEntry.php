<?php

namespace Obelaw\Accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Accounting\Models\Transaction;
use Obelaw\Twist\Base\BaseModel;

class JournalEntry extends BaseModel
{
    use HasFactory;

    protected $table = 'accounting_journal_entries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'transaction_id',
        'type',
        'amount',
    ];

    public function account()
    {
        return $this->hasOne(Account::class, 'id', 'account_id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'transaction_id');
    }

    public function getAmountDebitAttribute()
    {
        if ($this->type == 'debit')
            return $this->amount;

        return null;
    }

    public function getAmountCreditAttribute()
    {
        if ($this->type == 'credit')
            return $this->amount;

        return null;
    }

    public function debits()
    {
        return $this->hasMany(JournalEntry::class, 'transaction_id', 'transaction_id')
            ->where('type', 'debit');
    }

    public function credits()
    {
        return $this->hasMany(JournalEntry::class, 'transaction_id', 'transaction_id')
            ->where('type', 'credit');
    }
}
