<?php

namespace Obelaw\Accounting\Lib\Repositories\Eloquent;

use Obelaw\Accounting\Lib\Repositories\AccountRepositoryInterface;
use Obelaw\Accounting\Model\Account;
use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;

class AccountRepository extends Repository implements AccountRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param Account $model
     */
    public function __construct(Account $model)
    {
        parent::__construct($model);
    }

    public function findByCode($code)
    {
        return $this->model->whereCode($code)->first();
    }

    public function getParentOnly()
    {
        return $this->model->whereNull('parent_account')->orderBy('type')->get();
    }

    public function getCount()
    {
        return $this->model->count();
    }
}
