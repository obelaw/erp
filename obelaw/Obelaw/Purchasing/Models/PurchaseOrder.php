<?php

namespace Obelaw\Purchasing\Models;

use Obelaw\Framework\Base\ModelBase;
use Obelaw\Purchasing\Models\PurchaseOrderItem;

class PurchaseOrder extends ModelBase
{
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

    public function items()
    {
        return $this->hasMany(PurchaseOrderItem::class, 'order_id', 'id');
    }
}
