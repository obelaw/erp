<?php

namespace Obelaw\Sales\Models;

use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Base\ModelBase;

class TempSalesOrderItem extends ModelBase
{
    protected $table = 'temp_sales_order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'item_quantity',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
