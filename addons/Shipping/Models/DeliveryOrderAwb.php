<?php

namespace Obelaw\Shipping\Models;

use Obelaw\Twist\Base\BaseModel;

class DeliveryOrderAwb extends BaseModel
{
    protected $table = 'shipping_delivery_order_awbs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'awb',
    ];

    public function order()
    {
        return $this->hasOne(DeliveryOrder::class, 'id', 'order_id');
    }
}
