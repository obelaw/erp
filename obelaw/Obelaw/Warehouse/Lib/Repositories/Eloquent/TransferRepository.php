<?php

namespace Obelaw\Warehouse\Lib\Repositories\Eloquent;

use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;
use Obelaw\Warehouse\Lib\Repositories\TransferRepositoryInterface;
use Obelaw\Warehouse\Models\Transfer;

class TransferRepository extends Repository implements TransferRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param Transfer $model
     */
    public function __construct(Transfer $model)
    {
        parent::__construct($model);
    }
}
