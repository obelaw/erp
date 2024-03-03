<?php

namespace Obelaw\Accounting\Lib\Repositories\Eloquent;

use Obelaw\Accounting\Lib\Repositories\BillRepositoryInterface;
use Obelaw\Accounting\Model\Bill;
use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;

class BillRepository extends Repository implements BillRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param Bill $model
     */
    public function __construct(Bill $model)
    {
        parent::__construct($model);
    }
}
