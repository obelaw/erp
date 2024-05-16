<?php

namespace Obelaw\Sales\Lib\Repositories\Eloquent;

use Obelaw\Framework\Eloquent\Repository;
use Obelaw\Framework\Eloquent\Trids\CRUDRepository;
use Obelaw\Sales\Lib\Repositories\SalesOrderRepositoryInterface;
use Obelaw\Sales\Models\SalesFlatOrder;
use Obelaw\Sales\Models\SalesOrder;

class SalesOrderRepository extends Repository implements SalesOrderRepositoryInterface
{
    use CRUDRepository;

    /**
     * Repository constructor.
     *
     * @param SalesFlatOrder $model
     */
    public function __construct(SalesFlatOrder $model)
    {
        parent::__construct($model);
    }

    public function getAllContacts()
    {
        return SalesFlatOrder::all();
    }

    public function getSalesOrderById($orderId)
    {
        return SalesFlatOrder::findOrFail($orderId);
    }

    public function deleteSalesOrder($orderId)
    {
        return SalesFlatOrder::destroy($orderId);
    }

    public function createSalesOrder($salesOrderDetails)
    {
        return SalesFlatOrder::create($salesOrderDetails);
    }

    public function updateContact($orderId, array $newDetails)
    {
        return SalesFlatOrder::whereId($orderId)->update($newDetails);
    }

    public function canInvoice($orderId)
    {
        if ($order = SalesFlatOrder::findOrFail($orderId)) {
            if ($order->invoice()->exists()) {
                return false;
            }
        }

        return true;
    }

    public function createInvoice($orderId)
    {
        if ($order = SalesFlatOrder::findOrFail($orderId)) {
            return $order->invoice()->create();
        }
    }

    public function postInvoice($invoice, $entryId)
    {
        $invoice->entry_id = $entryId;
        $invoice->status = 'posted';
        $invoice->save();
        return $invoice;
    }
}
