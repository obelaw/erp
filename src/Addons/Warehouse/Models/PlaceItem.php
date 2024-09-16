<?php

namespace Obelaw\ERP\Addons\Warehouse\Models;

use Obelaw\ERP\Addons\Audit\Traits\HasSerialize;
use Obelaw\ERP\Addons\Catalog\Models\Product;
use Obelaw\ERP\Addons\Warehouse\Models\Place\Inventory;
use Obelaw\ERP\Addons\Warehouse\Models\PlaceItemLog;
use Obelaw\ERP\Addons\Warehouse\Models\TransferBundleSerial;
use Obelaw\Framework\Base\ModelBase;

class PlaceItem extends ModelBase
{
    use HasSerialize;

    protected static $serialSection = 'items';

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

    public function bundleSerials()
    {
        return $this->hasMany(TransferBundleSerial::class, 'item_id', 'id');
    }
}
