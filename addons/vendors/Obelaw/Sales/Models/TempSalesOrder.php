<?php

namespace Obelaw\Sales\Models;

use Obelaw\Contacts\Models\Contact;
use Obelaw\Framework\Base\ModelBase;

class TempSalesOrder extends ModelBase
{

    protected $table = 'temp_sales_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'customer_id',
        'coupon_code',
    ];

    public function customer()
    {
        return $this->hasOne(Contact::class, 'id', 'customer_id');
    }

    public function items()
    {
        return $this->hasMany(TempSalesOrderItem::class, 'order_id', 'id');
    }
}
