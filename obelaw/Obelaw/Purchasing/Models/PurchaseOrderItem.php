<?php

namespace Obelaw\Purchasing\Models;

use Obelaw\Framework\Base\ModelBase;

class PurchaseOrderItem extends ModelBase
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'item_name',
        'item_sku',
        'item_price',
        'item_quantity',
    ];
}
