<?php

namespace Obelaw\Accounting\Model;

use Obelaw\Framework\Base\ModelBase;

class BillItem extends ModelBase
{
    protected $table = 'accounting_bill_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bill_id',
        'item_name',
        'item_sku',
        'item_price',
        'item_quantity',
    ];
}
