<?php

namespace Obelaw\ERP\Addons\Sales\Lib\Services;

use Obelaw\ERP\Addons\Sales\Models\SalesFlatOrder;
use Obelaw\ERP\Base\BaseService;

class SalesOrderService extends BaseService
{
    private SalesFlatOrder $salesFlatOrder;

    public function order(SalesFlatOrder $salesFlatOrder)
    {
        $this->salesFlatOrder = $salesFlatOrder;

        return $this;
    }

    public function calculateItemsTotal()
    {
        $itemsTotal = 0;

        foreach ($this->salesFlatOrder->items as $item) {
            $itemsTotal += $item->row_price;
        }

        return $itemsTotal;
    }

    public function calculateDiscountTotal()
    {
        $discountTotal = 0;

        // TODO Write logic here

        return $discountTotal;
    }

    public function calculateShippingTotal()
    {
        $shippingTotal = 0;

        // TODO Write logic here

        return $shippingTotal;
    }
    
    public function calculateTaxTotal()
    {
        $taxTotal = 0;

        // TODO Write logic here

        return $taxTotal;
    }

    public function calculateGrandTotal()
    {
        return ($this->calculateItemsTotal() + $this->calculateShippingTotal() + $this->calculateTaxTotal()) - $this->calculateDiscountTotal();
    }

    public function saveTotals()
    {
        $this->salesFlatOrder->sub_total = $this->calculateItemsTotal();
        $this->salesFlatOrder->discount_total = $this->calculateDiscountTotal();
        $this->salesFlatOrder->shipping_total = $this->calculateShippingTotal();
        $this->salesFlatOrder->tax_total = $this->calculateTaxTotal();
        $this->salesFlatOrder->grand_total = $this->calculateGrandTotal();
        $this->salesFlatOrder->save();
    }
}
