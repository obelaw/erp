<?php

namespace Obelaw\Purchasing\Models;

use Obelaw\Accounting\Model\Bill;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Purchasing\Models\PurchaseOrderItem;
use Obelaw\Serialization\Traits\HasSerialize;

class PurchaseOrder extends ModelBase
{
    use HasSerialize;

    protected static $serialPrefix = 'OP';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vendor_id',
        'cart_ulid',
        'sub_total',
        'tax_total',
        'grand_total',
    ];

    public function bill()
    {
        return $this->hasOne(Bill::class, 'order_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(PurchaseOrderItem::class, 'order_id', 'id');
    }
}
