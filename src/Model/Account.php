<?php

namespace Obelaw\Accounting\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;
use Illuminate\Support\Facades\DB;

class Account extends ModelBase
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_account',
        'name',
        'code',
        'type',
        'can_negative_count',
    ];

    public function getAmountAttribute()
    {
        $credit = $this->creditEntries()->withCount([
            'amounts' => function ($query) {
                $query->select(DB::raw('SUM(credit_amount)'));
            }
        ])->get()->sum('amounts_count');

        $debit = $this->debitEntries()->withCount([
            'amounts' => function ($query) {
                $query->select(DB::raw('SUM(debit_amount)'));
            }
        ])->get()->sum('amounts_count');

        return $debit - $credit;
    }

    public function accounts()
    {
        return $this->hasMany(Account::class, 'parent_account', 'id');
    }

    public function creditEntries()
    {
        return $this->hasMany(AccountEntry::class, 'credit_account_id', 'id');
    }

    public function debitEntries()
    {
        return $this->hasMany(AccountEntry::class, 'debit_account_id', 'id');
    }
}
