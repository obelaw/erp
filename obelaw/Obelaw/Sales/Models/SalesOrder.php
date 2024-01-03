<?php

namespace Obelaw\Sales\Models;

use Obelaw\Framework\Base\ModelBase;

class SalesOrder extends ModelBase
{
    protected $table = 'sales_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'sub_total',
        'discount_total',
        'shipping_total',
        'tax_total',
        'grand_total',
    ];

    public function items()
    {
        return $this->hasMany(SalesOrderItem::class, 'order_id', 'id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'order_id', 'id');
    }
}
