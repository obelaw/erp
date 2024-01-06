<?php

namespace Obelaw\Manufacturing\Filters;

use Obelaw\Framework\Utils\Currency;
use Obelaw\Manufacturing\Facades\Orders;

class ProductsGridFilter
{
    public function costTotal($value, $row)
    {
        return number_format(Orders::costTotal($row->id)) . ' ' . Currency::symbol();
    }
}
