<?php

namespace Obelaw\Warehouse\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Warehouse\Facades\TransferType;

class Transfer extends ModelBase
{
    use HasFactory;

    protected $table = 'warehouse_transfers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'inventory_from',
        'inventory_to',
        'product_id',
        'type',
        'quantity',
        'description',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot()
    {
        parent::boot();

        static::created(function ($item) {
            if ($item->sourceable_type) {
                $item->type = TransferType::getType($item->sourceable_type);
                $item->save();
            }
        });
    }

    /**
     * Get a count of inventories
     */
    protected function inventoryFromName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->inventoryFrom->name ?? '<a href="' . route('obelaw.warehouse.adjustments.show', [$this]) . '">Adjustment #' . $this->sourceable->id . '</a>'
        );
    }

    protected function inventoryToName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->inventoryTo->name
        );
    }

    protected function productName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->product->name
        );
    }

    public function inventoryFrom()
    {
        return $this->hasOne(Inventory::class, 'id', 'inventory_from');
    }

    public function inventoryTo()
    {
        return $this->hasOne(Inventory::class, 'id', 'inventory_to');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * Get all of the models that own serials.
     */
    public function sourceable()
    {
        return $this->morphTo();
    }
}
