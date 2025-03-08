<?php

namespace Obelaw\ERP\Addons\Sales\Models;

use Obelaw\ERP\Addons\Accounting\Models\PaymentMethod;
use Obelaw\ERP\Addons\Audit\Traits\HasSerialize;
use Obelaw\ERP\Addons\Contacts\Models\Address;
use Obelaw\ERP\Addons\Sales\Models\Customer;
use Obelaw\ERP\Addons\Sales\Models\OrderStatus;
use Obelaw\ERP\Addons\Sales\Models\SalesFlatOrderAddress;
use Obelaw\ERP\Addons\Sales\Models\SalesFlatOrderItem;
use Obelaw\ERP\Addons\Sales\Models\SalesInvoice;
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

    public function cancelReason()
    {
        return $this->belongsTo(OrderCancelReason::class, 'reason_id');
    }

    public function items()
    {
        return $this->hasMany(SalesFlatOrderItem::class, 'order_id', 'id');
    }

    public function invoice()
    {
        return $this->hasOne(SalesInvoice::class, 'order_id', 'id');
    }

    public function isCancel()
    {
        return $this->reason_id && $this->cancel_at;
    }
}
