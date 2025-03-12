<?php

namespace Obelaw\Warehouse\Models;

use Obelaw\Catalog\Models\Product;
use Obelaw\Warehouse\Models\TransferBundle;
use Obelaw\Twist\Base\BaseModel;

class TransferItem extends BaseModel
{
    protected $table = 'warehouse_transfer_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transfer_id',
        'product_id',
        'quantity',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function bundle()
    {
        return $this->hasOne(TransferBundle::class, 'transfer_item_id', 'id');
    }
}
