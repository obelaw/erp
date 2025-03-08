<?php

namespace Obelaw\ERP\Addons\Sales\Models;

use Obelaw\ERP\Addons\Catalog\Models\Product;
use Obelaw\Twist\Base\BaseModel;

class SalesFlatOrderItem extends BaseModel
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
