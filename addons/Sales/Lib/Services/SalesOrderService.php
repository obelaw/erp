<?php

namespace Obelaw\ERP\Addons\Sales\Lib\Services;

use Obelaw\ERP\Addons\Sales\Models\SalesFlatOrder;
use Obelaw\ERP\Addons\Sales\Models\SalesFlatOrderAddress;
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

    public function cloneCustomerAddress()
    {
        $address = $this->salesFlatOrder->addressContact;

        SalesFlatOrderAddress::create([
            'order_id' => $this->salesFlatOrder->id,
            'country_id' => $address->country_id,
            'city_id' => $address->city_id,
            'state_id' => $address->state_id,
            'area_id' => $address->area_id,
            'postcode' => $address->postcode,
            'street_line_1' => $address->street_line_1,
            'street_line_2' => $address->street_line_2,
            'phone_number' => $address->phone_number,
        ]);
    }
}
