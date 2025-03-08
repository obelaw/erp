<?php

namespace Obelaw\ERP\Addons\Shipping\Models;

use Obelaw\Twist\Base\BaseModel;

class DeliveryOrderItem extends BaseModel
{
    protected $table = 'shipping_delivery_order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'item_id',
    ];
}
