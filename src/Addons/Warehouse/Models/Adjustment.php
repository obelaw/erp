<?php

namespace Obelaw\ERP\Addons\Warehouse\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\ERP\Addons\Catalog\Models\Product;
use Obelaw\ERP\Addons\Warehouse\Models\Place\Inventory;
use Obelaw\ERP\Addons\Warehouse\Models\PlaceItem;
use Obelaw\Framework\Base\ModelBase;

class Adjustment extends ModelBase
{
    use HasFactory;

    protected $table = 'warehouse_adjustments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'place_id',
        'product_id',
        'quantity',
        'description',
    ];

    protected function productName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->product->name
        );
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'id', 'place_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * Get all of the model's serials.
     */
    public function inventoryItem()
    {
        return $this->morphOne(PlaceItem::class, 'sourceable');
    }
}
