<?php

namespace Obelaw\Warehouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Serialization\Traits\HasSerialize;

class InventoryItem extends ModelBase
{
    use HasFactory;
    use HasSerialize;

    protected static $serialPrefix = 'inven';
    protected static $serialHit = 'prd';

    protected $table = 'warehouse_inventory_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'inventory_id',
        'product_id',
        'status',
    ];

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'id', 'inventory_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function sourceable()
    {
        return $this->morphTo();
    }
}
