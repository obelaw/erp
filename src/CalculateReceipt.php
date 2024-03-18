<?php

namespace Obelaw\ERP;

use function O\Calculate\percentageCalculate;

class CalculateReceipt
{
    private $subTotal = null;
    private $totalTaxs = null;
    private $totalDiscounts = null;
    private $total = null;

    public function __construct(
        public array $items,
        public array $taxs,
        public array $discounts = []
    ) {
        $this->subTotal = $this->calculateSubTotal($items);
        $this->totalTaxs = $this->calculateTotalTaxs($this->subTotal, $taxs);
        $this->totalDiscounts = $this->calculateDiscounts($this->subTotal, $discounts);
        $this->total = ($this->subTotal + $this->totalTaxs) - $this->totalDiscounts;
    }

    private function calculateSubTotal($items)
    {
        return collect($items)->sum(function (array $item) {
            return $item['price'] * $item['quantity'];
        });
    }

    public function calculateTotalTaxs($subTotal, $taxs)
    {
        return collect($taxs)->sum(function (array $tax) use ($subTotal) {
            if ($tax['type'] == 'percent') {
                return percentageCalculate($subTotal, $tax['value']);
            }

            if ($tax['type'] == 'fixed') {
                return $tax['value'];
            }
        });
    }

    public function calculateDiscounts($subTotal, $discounts)
    {
        return collect($discounts)->sum(function (array $discount) use ($subTotal) {
            if ($discount['type'] == 'percent') {
                return percentageCalculate($subTotal, $discount['value']);
            }

            if ($discount['type'] == 'fixed') {
                return $discount['value'];
            }
        });
    }

    public function getSubTotal(): float
    {
        return $this->subTotal;
    }

    public function getTotalTaxs(): float
    {
        return $this->totalTaxs;
    }

    public function getTotalDiscounts(): float
    {
        return $this->totalDiscounts;
    }

    public function getTotal(): float
    {
        return $this->total;
    }
}
