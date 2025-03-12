<?php

namespace Obelaw\Accounting\Models;

use Obelaw\Accounting\Models\Account;
use Obelaw\Twist\Base\BaseModel;

class PaymentMethod extends BaseModel
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
