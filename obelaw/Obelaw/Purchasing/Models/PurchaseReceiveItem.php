<?php

namespace Obelaw\Purchasing\Models;

use Obelaw\Framework\Base\ModelBase;

class PurchaseReceiveItem extends ModelBase
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'receive_id',
        'order_item_id',
        'received_quantity',
    ];

    public function orderItem()
    {
        return $this->hasOne(PurchaseOrderItem::class, 'id', 'order_item_id');
    }
}
