<?php

namespace Obelaw\Catalog\Lib\Services;

use Obelaw\Catalog\Lib\DTOs\InitProductDTO;
use Obelaw\Catalog\Lib\Events\ProductCreated;
use Obelaw\Catalog\Lib\Repositories\ProductRepositoryInterface;

class ProductService
{
    public function __construct(
        public ProductRepositoryInterface $productRepository,
    ) {
    }

    public function create(InitProductDTO $initProductDTO)
    {
        $product = $this->productRepository->store($initProductDTO->getData());

        ProductCreated::dispatch($product);
    }

    public function update(int $productId, InitProductDTO $initProductDTO)
    {
        $product = $this->productRepository->update($productId, $initProductDTO->getData());
    }
}
