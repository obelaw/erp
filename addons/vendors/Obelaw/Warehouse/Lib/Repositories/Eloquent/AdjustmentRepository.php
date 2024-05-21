<?php

namespace Obelaw\Warehouse\Lib\Repositories\Eloquent;

use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;
use Obelaw\Warehouse\Lib\Repositories\AdjustmentRepositoryInterface;
use Obelaw\Warehouse\Models\Adjustment;

class AdjustmentRepository extends Repository implements AdjustmentRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param Adjustment $model
     */
    public function __construct(Adjustment $model)
    {
        parent::__construct($model);
    }
}
