<?php

namespace Obelaw\Catalog\Lib\Services;

use Obelaw\Catalog\Enums\ProductType;
use Obelaw\Catalog\Models\Product;

class ProductService
{
    // public function __construct(
    //     public ProductRepositoryInterface $productRepository,
    // ) {
    // }

    // public function create(InitProductDTO $initProductDTO)
    // {
    //     $product = $this->productRepository->store($initProductDTO->getData());

    //     ProductCreated::dispatch($product);
    // }

    // public function update(int $productId, InitProductDTO $initProductDTO)
    // {
    //     $product = $this->productRepository->update($productId, $initProductDTO->getData());
    // }

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
