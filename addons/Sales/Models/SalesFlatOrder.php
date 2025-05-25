<?php

namespace Obelaw\Sales\Models;

use Obelaw\Accounting\Models\PaymentMethod;
use Obelaw\Audit\Traits\HasSerialize;
use Obelaw\Contacts\Models\Address;
use Obelaw\Sales\Models\Customer;
use Obelaw\Sales\Models\OrderStatus;
use Obelaw\Sales\Models\SalesFlatOrderAddress;
use Obelaw\Sales\Models\SalesFlatOrderItem;
use Obelaw\Sales\Models\SalesInvoice;
use Obelaw\Permit\Models\PermitUser;
use Obelaw\Twist\Base\BaseModel;

class SalesFlatOrder extends BaseModel
{
    use HasSerialize;

    protected static $serialSection = 'ORDER';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status_id',
        'salesperson_id',
        'address_id',
        'sale_place_id',
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
        'payment_method_id',
        'payment_method_reference',
    ];

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function salesperson(): mixed
    {
        return $this->belongsTo(PermitUser::class, 'salesperson_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'payment_method_id');
    }

    public function addressContact()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

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
        return $this->hasOne(SalesInvoice::class, 'order_id', 'id');
    }
}
