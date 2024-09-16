<?php

namespace Obelaw\ERP\Addons\Purchasing\Models;

use Obelaw\Framework\Base\ModelBase;

class VendorJournal extends ModelBase
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
