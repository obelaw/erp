<?php

namespace Obelaw\Sales\Facades;

use Illuminate\Support\Facades\Facade;

class TempSalesOrders extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sales.temp.salesorders';
    }
}
