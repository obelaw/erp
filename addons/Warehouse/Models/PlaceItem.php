<?php

namespace Obelaw\Warehouse\Models;

use Obelaw\Catalog\Enums\StockType;
use Obelaw\Catalog\Models\Product;
use Obelaw\Twist\Base\BaseModel;
use Obelaw\Warehouse\Models\Place\Inventory;
use Obelaw\Warehouse\Models\PlaceItemLog;
use Obelaw\Warehouse\Models\TransferBundleSerial;

class PlaceItem extends BaseModel
{
    protected static $serialSection = 'items';

    protected $table = 'warehousing_place_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sourceable_type',
        'sourceable_id',
        'reference_id',
        'place_id',
        'product_id',
        'serial_number',
        'quantity',
        'type',
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

    public function bundleSerials()
    {
        return $this->hasMany(TransferBundleSerial::class, 'item_id', 'id');
    }
}
