<?php

namespace Obelaw\Sales\Lib\Repositories\Eloquent;

use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;
use Obelaw\Sales\Lib\Repositories\CustomerRepositoryInterface;
use Obelaw\Sales\Models\Customer;

class CustomerRepository extends Repository implements CustomerRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }
}
