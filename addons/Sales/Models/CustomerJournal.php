<?php

namespace Obelaw\Sales\Models;

use Obelaw\Twist\Base\BaseModel;

class CustomerJournal extends BaseModel
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
