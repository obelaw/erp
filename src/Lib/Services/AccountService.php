<?php

namespace Obelaw\Accounting\Lib\Services;

use Obelaw\Accounting\Lib\Repositories\AccountRepositoryInterface;
use Obelaw\Framework\Base\ServiceBase;

class AccountService extends ServiceBase
{
    public function __construct(
        public AccountRepositoryInterface $accountRepository,
    ) {
    }

    public function create(array $data)
    {
        return $this->accountRepository->store($data);
    }

    public function getById(int $id)
    {
        return $this->accountRepository->find($id);
    }

    public function getByCode($code)
    {
        return $this->accountRepository->findByCode($code);
    }

    public function getParentOnly()
    {
        return $this->accountRepository->getParentOnly();
    }

    public function getCount()
    {
        return $this->accountRepository->getCount();
    }
}
