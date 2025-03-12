<?php

namespace Obelaw\Purchasing\Models;

use Obelaw\Catalog\Models\Product;
use Obelaw\Twist\Base\BaseModel;

class PurchaseOrderItem extends BaseModel
{
    protected $table = 'purchasing_purchase_order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'item_price',
        'row_total',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
