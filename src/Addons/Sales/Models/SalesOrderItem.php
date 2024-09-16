<?php

namespace Obelaw\Sales\Models;

use Obelaw\Twist\Base\BaseModel;

class SalesOrderItem extends BaseModel
{
    protected $table = 'sales_order_items';

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
        'item_discount_price',
        'item_quantity',
    ];
}
