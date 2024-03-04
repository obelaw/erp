<?php

namespace Obelaw\Warehouse\Models;

use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Serialization\Traits\HasSerialize;
use Obelaw\Warehouse\Models\Place\Inventory;
use Obelaw\Warehouse\Models\PlaceItemLog;

class PlaceItem extends ModelBase
{
    use HasSerialize;

    protected static $serialPrefix = 'items';

    protected $table = 'warehousing_place_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'place_id',
        'product_id',
        'quantity',
        'status',
    ];

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'id', 'place_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function logs()
    {
        return $this->hasMany(PlaceItemLog::class, 'record_source', 'id');
    }
}
