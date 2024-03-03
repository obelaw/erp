<?php

namespace Obelaw\Sales\Lib\Repositories\Eloquent;

use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;
use Obelaw\Sales\Lib\Repositories\SalesOrderRepositoryInterface;
use Obelaw\Sales\Models\SalesOrder;

class SalesOrderRepository extends Repository implements SalesOrderRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param SalesOrder $model
     */
    public function __construct(SalesOrder $model)
    {
        parent::__construct($model);
    }

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
