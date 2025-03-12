<?php

namespace Obelaw\Catalog\Lib\Services;

use Obelaw\Catalog\Enums\ProductType;
use Obelaw\Catalog\Models\Product;


class ProductService
{
    public function getCountConsumableType()
    {
        return Product::where('product_type', ProductType::CONSUMABLE())->count();
    }

    public function getCountServiceType()
    {
        return Product::where('product_type', ProductType::SERVICE())->count();
    }

    public function getCountStorableType()
    {
        return Product::where('product_type', ProductType::STORABLE())->count();
    }
}
