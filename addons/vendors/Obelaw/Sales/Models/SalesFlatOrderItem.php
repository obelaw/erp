<?php

namespace Obelaw\Sales\Models;

use Obelaw\Framework\Base\ModelBase;

class SalesFlatOrderItem extends ModelBase
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'name',
        'sku',
        'quantity',
        'sub_total',
    ];
}
