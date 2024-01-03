<?php

namespace Obelaw\Sales\Facades;

use Illuminate\Support\Facades\Facade;

class SalesOrders extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sales.sales_order';
    }
}
