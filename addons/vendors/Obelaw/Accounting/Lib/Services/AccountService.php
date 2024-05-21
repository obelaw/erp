<?php

namespace Obelaw\Accounting\Lib\Services;

use Obelaw\Accounting\DTO\Account\CreateAccountDTO;
use Obelaw\Accounting\DTO\Account\GetAccountByCodeDTO;
use Obelaw\Accounting\DTO\Account\GetAccountByIdDTO;
use Obelaw\Accounting\Lib\Repositories\AccountRepositoryInterface;
use Obelaw\Framework\Base\ServiceBase;

class AccountService extends ServiceBase
{
    public function __construct(
        public AccountRepositoryInterface $accountRepository,
    ) {
    }

    public function create(CreateAccountDTO $createAccountDTO)
    {
        return $this->accountRepository->store($createAccountDTO->getData());
    }

    public function getById(GetAccountByIdDTO $getAccountByIdDTO)
    {
        return $this->accountRepository->find($getAccountByIdDTO->id);
    }

    public function getByCode(GetAccountByCodeDTO $getAccountByCodeDTO)
    {
        return $this->accountRepository->findByCode($getAccountByCodeDTO->code);
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
