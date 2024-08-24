<?php

namespace Obelaw\ERP\Addons\Accounting\Models;

use Obelaw\ERP\Addons\Accounting\Models\Account;
use Obelaw\Framework\Base\ModelBase;

class PaymentMethod extends ModelBase
{
    protected $table = 'accounting_payment_methods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'journal_id',
        'name',
        'is_active',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function journal()
    {
        return $this->hasOne(Account::class, 'id', 'journal_id');
    }
}
