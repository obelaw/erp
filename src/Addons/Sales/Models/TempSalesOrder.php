<?php

namespace Obelaw\Sales\Models;

use Obelaw\Accounting\Models\PaymentMethod;
use Obelaw\Contacts\Models\Contact;
use Obelaw\Twist\Base\BaseModel;
use Obelaw\Sales\Models\SalesFlatOrder;

class TempSalesOrder extends BaseModel
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
        'address_id',
        'coupon_code',
        'payment_method_id',
        'payment_method_reference',
    ];

    public function flatOrder()
    {
        return $this->hasOne(SalesFlatOrder::class, 'temp_order_id', 'id');
    }

    public function customer()
    {
        return $this->hasOne(Contact::class, 'id', 'customer_id');
    }

    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'payment_method_id');
    }

    public function items()
    {
        return $this->hasMany(TempSalesOrderItem::class, 'order_id', 'id');
    }
}
