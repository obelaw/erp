<?php

namespace Obelaw\Shipping\Models;

use Obelaw\Audit\Traits\HasSerialize;
use Obelaw\Sales\Models\SalesFlatOrder;
use Obelaw\Shipping\Models\DeliveryOrderAwb;
use Obelaw\Twist\Base\BaseModel;

class DeliveryOrder extends BaseModel
{
    use HasSerialize;

    protected static $serialSection = 'DO';

    protected $table = 'shipping_delivery_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'order_id',
        'cod_amount',
    ];

    public function account()
    {
        return $this->hasOne(CourierAccount::class, 'id', 'account_id');
    }

    public function order()
    {
        return $this->hasOne(SalesFlatOrder::class, 'id', 'order_id');
    }

    public function AWB()
    {
        return $this->hasOne(DeliveryOrderAwb::class, 'order_id', 'id');
    }

    public function AWBs()
    {
        return $this->hasMany(DeliveryOrderAwb::class, 'order_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(DeliveryOrderItem::class, 'order_id', 'id');
    }
}
