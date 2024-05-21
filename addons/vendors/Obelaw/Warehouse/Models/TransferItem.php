<?php

namespace Obelaw\Warehouse\Models;

use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Base\ModelBase;

class TransferItem extends ModelBase
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
