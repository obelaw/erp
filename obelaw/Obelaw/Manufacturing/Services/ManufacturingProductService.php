<?php

namespace Obelaw\Manufacturing\Services;

use Obelaw\Manufacturing\Repositories\ManufacturingProductRepository;

class ManufacturingProductService
{
    public function __construct(
        public ManufacturingProductRepository $manufacturingProductRepository
    ) {
    }

    public function costTotal($productId)
    {
        return $this->manufacturingProductRepository->costTotal($productId);
    }

    public function getVariants($productId)
    {
        return $this->manufacturingProductRepository->getVariants($productId);
    }
}
