<?php

namespace Obelaw\Purchasing\Models;

use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Base\ModelBase;

class PurchaseOrderItem extends ModelBase
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'item_price',
        'item_quantity',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
