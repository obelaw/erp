<?php

namespace Obelaw\Manufacturing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Serialization\Traits\HasSerialize;
use Obelaw\Warehouse\Models\Inventory;

class Order extends ModelBase
{
    use HasFactory;
    use HasSerialize;

    protected static $serialPrefix = 'manuf';
    protected static $serialHit = 'ord';

    protected $table = 'manufacturing_orders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'product_id',
        'inventory_id',
        'quantity',
        'start_at',
        'end_at',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function inventory()
    {
        return $this->hasOne(inventory::class, 'id', 'inventory_id');
    }

    public function plan()
    {
        return $this->hasOne(PlanOrder::class, 'id', 'order_id');
    }

    public function workers()
    {
        return $this->hasMany(OrderWorker::class, 'order_id', 'id');
    }
}
