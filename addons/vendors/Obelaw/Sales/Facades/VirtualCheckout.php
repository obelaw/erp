<?php

namespace Obelaw\Sales\Facades;

use Illuminate\Support\Facades\Facade;

class VirtualCheckout extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sales.virtualcart';
    }
}
