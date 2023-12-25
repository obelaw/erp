<?php

namespace Obelaw\Accounting\Lib\Services;


use Obelaw\Accounting\DTO\PriceList\CreatePriceListDTO;
use Obelaw\Accounting\Lib\Repositories\PriceListRepositoryInterface;
use Obelaw\Framework\Base\ServiceBase;

class PriceListService extends ServiceBase
{
    public function __construct(
        public PriceListRepositoryInterface $priceListRepository,
    ) {
    }

    public function create(CreatePriceListDTO $createPriceListDTO)
    {
        return $this->priceListRepository->store($createPriceListDTO->getData());
    }

    public function update(int $id, CreatePriceListDTO $createPriceListDTO)
    {
        return $this->priceListRepository->update($id, $createPriceListDTO->getData());
    }
}
