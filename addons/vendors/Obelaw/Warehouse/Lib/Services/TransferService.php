<?php

namespace Obelaw\Warehouse\Lib\Services;

use Exception;
use Obelaw\ERP\Base\BaseService;
use Obelaw\Warehouse\Enums\TransferStatus;
use Obelaw\Warehouse\Models\Place;
use Obelaw\Warehouse\Models\Transfer;

class TransferService extends BaseService
{
    public function canApprove(Transfer $transfer)
    {
        if ($transfer->status == TransferStatus::DRAFT())
            return true;

        return false;
    }

    public function approve(Transfer $transfer)
    {
        $transfer->status = TransferStatus::READY();
        $transfer->save();
    }

    public function canTransfer(Transfer $transfer)
    {
        if ($transfer->status == TransferStatus::READY())
            return true;

        return false;
    }

    public function transfer(Transfer $transfer)
    {
        foreach ($transfer->items as $item) {

            $place = Place::find($transfer->inventory_from);
            $itemsCount = $place->items()->where('product_id', $item['product_id'])->count();

            if ($itemsCount >= $item['quantity']) {

                $itemsSeleted = $place->items()
                    ->where('product_id', $item['product_id'])
                    ->limit($item['quantity'])
                    ->get();

                foreach ($itemsSeleted as $itemSeleted) {
                    $itemSeleted->place_id = $transfer->inventory_to;
                    $itemSeleted->save();
                }

                $transfer->status = TransferStatus::DONE();
                $transfer->save();
            } else {
                throw new Exception("This place not have quantity", 1);
            }
        }

        return $transfer;
    }

    public function checkPlaceHasItemsQuantity(Transfer $transfer)
    {
        foreach ($transfer->items as $item) {
            $place = Place::find($transfer->inventory_from);
            $itemsCount = $place->items()->where('product_id', $item['product_id'])->count();

            if ($itemsCount >= $item['quantity']) {
                return true;
            } else {
                throw new Exception("This place not have quantity", 1);
            }
        }
    }
}
