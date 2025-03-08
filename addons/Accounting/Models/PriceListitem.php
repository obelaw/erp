<?php

namespace Obelaw\ERP\Addons\Accounting\Models;

use Obelaw\ERP\Addons\Catalog\Models\Product;
use Obelaw\Twist\Base\BaseModel;

class PriceListitem extends BaseModel
{
    protected $table = 'accounting_pricelist_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'list_id',
        'product_id',
        'price',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
