<?php

namespace Obelaw\Purchasing\Models;

use Obelaw\Twist\Base\BaseModel;

class VendorJournal extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vendor_id',
        'account_receivable',
        'account_payable',
    ];
}
