<?php

namespace Obelaw\Accounting\Lib\Repositories\Eloquent;

use Obelaw\Accounting\Lib\Repositories\PriceListRepositoryInterface;
use Obelaw\Accounting\Model\PriceList;
use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;

class PriceListRepository extends Repository implements PriceListRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param PriceList $model
     */
    public function __construct(PriceList $model)
    {
        parent::__construct($model);
    }
}
