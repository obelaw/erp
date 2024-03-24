<?php

namespace Obelaw\Purchasing\Models;

use Obelaw\Accounting\Model\Bill;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Purchasing\Models\PurchaseOrderItem;
use Obelaw\Purchasing\Models\PurchaseReceive;
use Obelaw\Serialization\Traits\HasSerialize;

class PurchaseOrder extends ModelBase
{
    use HasSerialize;

    protected static $serialSection = 'OP';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vendor_id',
        'sub_total',
        'tax_total',
        'grand_total',
        'status',
    ];

    public function bill()
    {
        return $this->hasOne(Bill::class, 'order_id', 'id');
    }

    public function receive()
    {
        return $this->hasOne(PurchaseReceive::class, 'order_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(PurchaseOrderItem::class, 'order_id', 'id');
    }
}
