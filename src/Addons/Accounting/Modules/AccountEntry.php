<?php

namespace Obelaw\ERP\Addons\Accounting\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\ERP\Addons\Accounting\Modules\AccountEntryAmount;
use Obelaw\Framework\Base\ModelBase;

class AccountEntry extends ModelBase
{
    use HasFactory;

    protected $table = 'accounting_account_entries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'added_on',
    ];

    public function getTotalAttribute()
    {
        $debit = $this->amount()->whereType('debit')->sum('amount');
        $credit = $this->amount()->whereType('credit')->sum('amount');

        return amount($credit) . ' / ' . amount($debit);
    }

    public function items()
    {
        return $this->hasMany(AccountEntryAmount::class, 'entry_id', 'id');
    }

    public function amount()
    {
        return $this->hasOne(AccountEntryAmount::class, 'entry_id', 'id');
    }

    public function amounts()
    {
        return $this->hasMany(AccountEntryAmount::class, 'entry_id', 'id');
    }
}
