<?php

namespace Obelaw\Warehouse\Lib\Services;

use Obelaw\Framework\Base\ServiceBase;
use Obelaw\Warehouse\Lib\DTOs\Adjustment\InitTransferDTO;
use Obelaw\Warehouse\Lib\Repositories\TransferRepositoryInterface;
use Obelaw\Warehouse\Lib\Services\AuditStockService;
use Obelaw\Warehouse\Models\PlaceItem;

/**
 * @deprecated Use TransferService.
 */
class TransferServiceOld extends ServiceBase
{
    public function __construct(
        public TransferRepositoryInterface $transferRepository,
        public AuditStockService $auditStockService,
    ) {
    }

    public function new(InitTransferDTO $initTransferDTO)
    {
        return  $this->transferRepository->store($initTransferDTO->getData());
    }

    public function transferSerials($placeForm, $placeTo, $serials)
    {
        $nonOwnedSeries = $this->auditStockService->NonOwnedSeries($placeForm, $serials);

        if (!empty($nonOwnedSeries)) {
            throw new \Exception(implode(', ', $nonOwnedSeries));
        }

        foreach ($serials as $serial) {
            if ($item = PlaceItem::where('place_id', $placeForm)->whereHas('serialOne',  fn ($query) => $query->where('barcode', '=', $serial))->first()) {
                $item->place_id = $placeTo;
                $item->save();
            }
        }
    }
}
