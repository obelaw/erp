<?php

namespace Obelaw\Manufacturing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Catalog\Models\Variant;
use Obelaw\Framework\Base\ModelBase;

class ProductVariant extends ModelBase
{
    use HasFactory;

    protected $table = 'manufacturing_product_variants';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'variant_id',
        'unit',
    ];

    public function variant()
    {
        return $this->hasOne(Variant::class, 'id', 'variant_id');
    }
}
