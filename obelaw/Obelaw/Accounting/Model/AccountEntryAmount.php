<?php

namespace Obelaw\Accounting\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;

class AccountEntryAmount extends ModelBase
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'entry_id',
        'type',
        'amount',
    ];

    public function account()
    {
        return $this->hasOne(Account::class, 'id', 'account_id');
    }

    public function entry()
    {
        return $this->hasOne(AccountEntry::class, 'id', 'entry_id');
    }

    public function debits()
    {
        return $this->hasMany(AccountEntryAmount::class, 'entry_id', 'entry_id')
            ->where('type', 'debit');
    }

    public function credits()
    {
        return $this->hasMany(AccountEntryAmount::class, 'entry_id', 'entry_id')
            ->where('type', 'credit');
    }
}
