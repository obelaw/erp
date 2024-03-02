<?php

namespace Obelaw\Purchasing\Lib\Repositories\Eloquent;

use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;
use Obelaw\Purchasing\Lib\Repositories\PurchaseOrderRepositoryInterface;
use Obelaw\Purchasing\Models\PurchaseOrder;

class PurchaseOrderRepository extends Repository implements PurchaseOrderRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param PurchaseOrder $model
     */
    public function __construct(PurchaseOrder $model)
    {
        parent::__construct($model);
    }
}
