<?php

namespace Obelaw\Manufacturing\Repositories;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Obelaw\Catalog\Models\Product;
use Obelaw\Manufacturing\Models\ProductVariant;

class ManufacturingProductRepository
{
    public function costTotal($productId)
    {
        $product = new class extends Product
        {
            protected function costTotal(): Attribute
            {
                return Attribute::make(
                    get: fn () => $this->variants->map(function ($variant) {
                        return $variant->variant->cost * $variant->unit;
                    })->sum(),
                );
            }

            public function variants()
            {
                return $this->hasMany(ProductVariant::class, 'product_id', 'id');
            }
        };

        $product = new $product;

        return $product->find($productId)->costTotal;
    }

    public function getVariants($productId)
    {
        $product = new class extends Product
        {
            public function variants()
            {
                return $this->hasMany(ProductVariant::class, 'product_id', 'id');
            }
        };

        return (new $product)->find($productId)->variants()->with(['variant'])->get();
    }
}
