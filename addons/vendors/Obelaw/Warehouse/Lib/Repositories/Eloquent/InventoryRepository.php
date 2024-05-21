<?php

namespace Obelaw\Warehouse\Lib\Repositories\Eloquent;

use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;
use Obelaw\Warehouse\Lib\Repositories\InventoryRepositoryInterface;
use Obelaw\Warehouse\Models\Place\Inventory;

class InventoryRepository extends Repository implements InventoryRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param Inventory $model
     */
    public function __construct(Inventory $model)
    {
        parent::__construct($model);
    }
}
