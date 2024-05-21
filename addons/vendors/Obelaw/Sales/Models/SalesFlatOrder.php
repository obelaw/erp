<?php

namespace Obelaw\Sales\Models;

use Obelaw\Framework\Base\ModelBase;
use Obelaw\Sales\Models\SalesFlatOrderAddress;
use Obelaw\Sales\Models\SalesFlatOrderItem;
use Obelaw\Serialization\Traits\HasSerialize;

class SalesFlatOrder extends ModelBase
{
    use HasSerialize;

    protected static $serialSection = 'ORDER';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'temp_order_id',
        'sub_total',
        'discount_total',
        'shipping_total',
        'tax_total',
        'grand_total',
        'customer_id',
        'customer_name',
        'customer_phone',
        'customer_email',
    ];

    public function address()
    {
        return $this->hasOne(SalesFlatOrderAddress::class, 'order_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(SalesFlatOrderItem::class, 'order_id', 'id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'order_id', 'id');
    }
}
