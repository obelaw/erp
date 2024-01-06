<?php

namespace Obelaw\Manufacturing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Serialization\Traits\HasSerialize;
use Obelaw\Warehouse\Models\InventoryItem;
use Obelaw\Warehouse\Models\Transfer;

/**
 * This mode sends the manufactured product to the stock
 */
class Manufactured extends ModelBase
{
    use HasFactory;
    use HasSerialize;

    protected static $serialPrefix = 'manuf';
    protected static $serialHit = 'man';

    protected $table = 'warehouse_manufactured';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'inventory_id',
        'product_id',
        'quantity',
    ];

    /**
     * Get all of the model's serials.
     */
    public function inventoryItem()
    {
        return $this->morphOne(InventoryItem::class, 'sourceable');
    }

    /**
     * Get all of the model's serials.
     */
    public function transfer()
    {
        return $this->morphOne(Transfer::class, 'sourceable');
    }
}
