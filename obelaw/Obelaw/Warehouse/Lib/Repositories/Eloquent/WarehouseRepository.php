<?php

namespace Obelaw\Warehouse\Lib\Repositories\Eloquent;

use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;
use Obelaw\Warehouse\Lib\Repositories\WarehouseRepositoryInterface;
use Obelaw\Warehouse\Models\Place\Warehouse;

class WarehouseRepository extends Repository implements WarehouseRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param Warehouse $model
     */
    public function __construct(Warehouse $model)
    {
        parent::__construct($model);
    }
}
