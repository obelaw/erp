<?php

namespace Obelaw\ERP\Addons\Purchasing\Modules;

use Obelaw\ERP\Addons\Catalog\Models\Product;
use Obelaw\Framework\Base\ModelBase;

class PurchaseOrderItem extends ModelBase
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
