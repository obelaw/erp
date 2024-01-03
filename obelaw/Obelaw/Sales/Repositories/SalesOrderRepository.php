<?php

namespace Obelaw\Sales\Repositories;

use Obelaw\Accounting\DTO\Entry\AmountEntryDTO;
use Obelaw\Accounting\DTO\Entry\CreateEntryDTO;
use Obelaw\Accounting\Facades\Entries;
use Obelaw\Sales\Models\SalesOrder;

class SalesOrderRepository
{
    public function getAllContacts()
    {
        return SalesOrder::all();
    }

    public function getSalesOrderById($orderId)
    {
        return SalesOrder::findOrFail($orderId);
    }

    public function deleteSalesOrder($orderId)
    {
        return SalesOrder::destroy($orderId);
    }

    public function createSalesOrder($salesOrderDetails)
    {
        return SalesOrder::create($salesOrderDetails);
    }

    public function updateContact($orderId, array $newDetails)
    {
        return SalesOrder::whereId($orderId)->update($newDetails);
    }

    public function canInvoice($orderId)
    {
        if ($order = SalesOrder::findOrFail($orderId)) {
            if ($order->invoice()->exists()) {
                return false;
            }
        }

        return true;
    }

    public function createInvoice($orderId, $entryId)
    {
        if ($order = SalesOrder::findOrFail($orderId)) {
            return $order->invoice()->create([
                'entry_id' => $entryId
            ]);
        }
    }
}
