<?php

namespace Obelaw\Purchasing\Lib\Services;

use Obelaw\Accounting\Lib\Repositories\BillRepositoryInterface;
use Obelaw\Purchasing\Lib\DTOs\InitItemsDTO;
use Obelaw\Purchasing\Lib\DTOs\InitOrdertDTO;
use Obelaw\Purchasing\Lib\Repositories\PurchaseOrderRepositoryInterface;

class PurchaseOrderService
{
    public function __construct(
        public PurchaseOrderRepositoryInterface $purchaseOrderRepository,
        public BillRepositoryInterface $billRepository,
    ) {
    }

    public function create(InitOrdertDTO $initOrdertDTO, InitItemsDTO $initItemsDTO)
    {
        $order = $this->purchaseOrderRepository->store($initOrdertDTO->getData());

        foreach ($initItemsDTO->getData()['items'] as $quote) {
            $order->items()->create([
                'item_name' => $quote->item->name,
                'item_sku' => $quote->item->name,
                'item_price' => $quote->item->price_purchase,
                'item_quantity' => $quote->quantity,
            ]);
        }

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
                'item_name' => $item->item_name,
                'item_sku' => $item->item_sku,
                'item_price' => $item->item_price,
                'item_quantity' => $item->item_quantity,
            ]);
        }

        // Create entry

        return $bill;
    }
}
