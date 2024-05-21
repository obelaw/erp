<?php

namespace Obelaw\Purchasing\Models;

use Obelaw\Framework\Base\ModelBase;
use Obelaw\Purchasing\Models\PurchaseReceiveItem;

class PurchaseReceive extends ModelBase
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
    ];

    public function items()
    {
        return $this->hasMany(PurchaseReceiveItem::class, 'receive_id', 'id');
    }
}
