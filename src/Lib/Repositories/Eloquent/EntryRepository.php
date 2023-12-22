<?php

namespace Obelaw\Accounting\Lib\Repositories\Eloquent;

use Obelaw\Accounting\Lib\Repositories\EntryRepositoryInterface;
use Obelaw\Accounting\Model\AccountEntry;
use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;

class EntryRepository extends Repository implements EntryRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param AccountEntry $model
     */
    public function __construct(AccountEntry $model)
    {
        parent::__construct($model);
    }
}
