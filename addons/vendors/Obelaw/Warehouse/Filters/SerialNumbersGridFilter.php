<?php

namespace Obelaw\Warehouse\Filters;

class SerialNumbersGridFilter
{
    public function productName($value)
    {
        return $value->name;
    }

    public function inventoryName($value)
    {
        return $value->inventory->name ?? '-';
    }
}
