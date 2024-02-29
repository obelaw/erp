<?php

namespace Obelaw\Catalog\Lib\Repositories\Eloquent;

use Obelaw\Catalog\Lib\Repositories\ProductRepositoryInterface;
use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;

class ProductRepository extends Repository implements ProductRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}
