<?php

namespace Obelaw\Sales\Models;

use Obelaw\Framework\Base\ModelBase;

class CustomerJournal extends ModelBase
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'account_receivable',
        'account_payable',
    ];
}
