<?php

namespace Obelaw\Purchasing\Lib\Services;

use Obelaw\Accounting\Lib\Repositories\BillRepositoryInterface;
// use Obelaw\Purchasing\Lib\DTOs\InitItemsDTO;
// use Obelaw\Purchasing\Lib\DTOs\InitOrdertDTO;
use Obelaw\ERP\CalculateReceipt;
use Obelaw\Purchasing\Enums\POStatus;
use Obelaw\Purchasing\Lib\Repositories\PurchaseOrderRepositoryInterface;
use Obelaw\Purchasing\Lib\Services\PurchaseOrderMangerService;
use Obelaw\Purchasing\Models\PurchaseOrder;

class PurchaseOrderService
{
    public function __construct(
        public PurchaseOrderRepositoryInterface $purchaseOrderRepository,
        public BillRepositoryInterface $billRepository,
    ) {
    }

    public function createDraft($vendorId)
    {
        return $this->purchaseOrderRepository->store([
            'vendor_id' => $vendorId
        ]);
    }

    public function manger(PurchaseOrder $order)
    {
        return new PurchaseOrderMangerService($order);
    }

    public function create(PurchaseOrder $order)
    {
        $CR = new CalculateReceipt((new PurchaseOrderMangerService($order))->getItemsForCalculate(), [
            [
                'type' => 'percent',
                'value' => 14,
            ]
        ]);

        $order->sub_total = $CR->getSubTotal();
        $order->tax_total = $CR->getTotalTaxs();
        $order->grand_total = $CR->getTotal();
        $order->status = POStatus::READY();
        $order->save();

        return $order;
    }

    public function billIt($orderId)
    {
        $getOrder = $this->purchaseOrderRepository->find($orderId);

        if ($getOrder->bill) {
            throw new \Exception('This order has already been billed. #' . $getOrder->bill->id);
        }

        $order = $getOrder->toArray();
        $order['order_id'] = $getOrder->id;

        // Create bill 
        $bill = $this->billRepository->store($order);

        foreach ($getOrder->items as $item) {
            $bill->items()->create([
                'item_name' => $item->product->name,
                'item_sku' => $item->product->sku,
                'item_price' => $item->item_price,
                'item_quantity' => $item->item_quantity,
            ]);
        }

        // Create entry

        return $bill;
    }
}
