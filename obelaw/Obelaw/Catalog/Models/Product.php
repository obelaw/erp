<?php

namespace Obelaw\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Accounting\Facades\PriceLists;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Serialization\Traits\HasSerialize;

class Product extends ModelBase
{
    use HasFactory;
    use HasSerialize;

    protected static $serialSection = 'catal';
    protected $table = 'catalog_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'catagory_id',
        'product_type',
        'name',
        'sku',
        'can_sold',
        'can_purchased',
        'price_sales',
        'price_purchase',
    ];

    public function getCatagoryNameAttribute()
    {
        return $this->catagory->name ?? '--';
    }

    public function getPriceSalesAttribute($value): float
    {
        return $value ?? 0;
    }

    public function getFinalPriceSalesAttribute(): float
    {
        return PriceLists::getCurrentPriceBySKU($this->sku) ?? $this->price_sales ?? 0;
    }

    public function getPricePurchaseAttribute($value): float
    {
        return $value ?? 0;
    }

    public function scopeCanSold($query)
    {
        return $query->where('can_sold', true);
    }

    public function scopeCanPurchased($query)
    {
        return $query->where('can_purchased', true);
    }

    public function scopeInPos($query)
    {
        return $query->where('in_pos', true);
    }

    public function catagory()
    {
        return $this->hasOne(Catagory::class, 'id', 'catagory_id');
    }
}
