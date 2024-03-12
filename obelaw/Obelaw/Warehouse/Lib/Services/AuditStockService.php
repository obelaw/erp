<?php

namespace Obelaw\Warehouse\Lib\Services;

use Obelaw\Framework\Base\ServiceBase;
use Obelaw\Warehouse\Lib\Repositories\TransferRepositoryInterface;
use Obelaw\Warehouse\Models\Place;

class AuditStockService extends ServiceBase
{
    public function __construct(
        public TransferRepositoryInterface $transferRepository,
    ) {
    }

    public function NonOwnedSeries(int $place_id, array $serials)
    {
        $serialsIsNotFound = [];

        foreach ($serials as $serial) {
            if (!Place::find($place_id)->items()->whereHas('serialOne',  fn ($query) => $query->where('barcode', '=', $serial))->first()) {
                array_push($serialsIsNotFound, $serial);
            }
        }

        return $serialsIsNotFound;
    }
}
