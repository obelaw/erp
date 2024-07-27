<?php

namespace Obelaw\Sales\Lib\Services;

use Obelaw\ERP\Base\BaseService;
use Obelaw\Sales\Models\TempSalesOrder;

class SalesFlatOrderService extends BaseService
{
    public function postOrderFromTemp(TempSalesOrder $tempOrder)
    {
        $order = $tempOrder->flatOrder()->create([
            'customer_id' => $tempOrder->customer_id,
            'customer_name' => $tempOrder->customer->name,
            'customer_phone' => $tempOrder->customer->phone,
            'customer_email' => $tempOrder->customer->email,

            'payment_method_id' => $tempOrder->payment_method_id,
            'payment_method_reference' => $tempOrder->payment_method_reference,

            'sub_total' => $this->calculateSubTotal($tempOrder),
            'grand_total' => $this->calculateGrandTotal($tempOrder),
        ]);

        foreach ($tempOrder->items as $item) {
            $order->items()->create([
                'name' => $item->product->name,
                'sku' => $item->product->sku,
                'quantity' => $item->item_quantity,
                'unit_price' => $item->product->price_sales,
                'row_price' => ($item->item_quantity * $item->product->price_sales),
            ]);
        }
    }

    private function calculateSubTotal(TempSalesOrder $tempOrder)
    {
        $items = $tempOrder->items()->with('product')->get();

        $totalPriceSales = 0;
        foreach ($items as $item) {
            $totalPriceSales += ($item->product->price_sales * $item->item_quantity);
        }

        return $totalPriceSales;
    }

    private function calculateGrandTotal(TempSalesOrder $tempOrder)
    {
        $sup_total = $this->calculateSubTotal($tempOrder);

        return $sup_total;
    }
}
