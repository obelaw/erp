<?php

namespace Obelaw\Warehouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Serialization\Traits\HasSerialize;

class Inventory extends ModelBase
{
    use HasFactory;
    use HasSerialize;

    protected static $serialPrefix = 'wareh';
    protected static $serialHit = 'inv';

    protected $table = 'warehouse_inventories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'warehouse_id',
        'name',
        'code',
        'description',
        'address',
        'has_products',
        'has_variants',
    ];

    public function quantityAvailable($sku)
    {
        $allFroms = $this->transfersFrom()->whereSku($sku)->sum('quantity');
        $allTos = $this->transfersTo()->whereSku($sku)->sum('quantity');

        return $allTos - $allFroms;
    }

    public function warehouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'warehouse_id');
    }

    public function transfersFrom()
    {
        return $this->hasMany(Transfer::class, 'inventory_from', 'id');
    }

    public function transfersTo()
    {
        return $this->hasMany(Transfer::class, 'inventory_to', 'id');
    }

    public function serialNumbers()
    {
        return $this->hasMany(SerialNumberInventory::class, 'inventory_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(InventoryItem::class, 'inventory_id', 'id');
    }
}
