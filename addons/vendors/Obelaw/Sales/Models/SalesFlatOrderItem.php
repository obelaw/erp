<?php

namespace Obelaw\Sales\Models;

use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Base\ModelBase;

class SalesFlatOrderItem extends ModelBase
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'name',
        'sku',
        'quantity',
        'unit_price',
        'row_price'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'sku', 'sku');
    }
}
