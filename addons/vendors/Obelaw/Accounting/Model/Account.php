<?php

namespace Obelaw\Accounting\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Accounting\Lib\COA\AccountType;
use Obelaw\Framework\Base\ModelBase;

class Account extends ModelBase
{
    use HasFactory;

    protected $table = 'accounts';

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
    ];

    public function getAmountAttribute()
    {
        $debit = $this->entries()->whereType('debit')->sum('amount');
        $credit = $this->entries()->whereType('credit')->sum('amount');

        return $credit - $debit;
    }

    public function accounts()
    {
        return $this->hasMany(Account::class, 'parent_account', 'id');
    }

    public function entries()
    {
        return $this->hasMany(AccountEntryAmount::class, 'account_id', 'id');
    }

    public function rules()
    {
        return AccountType::instanceRules($this->type);
    }
}
