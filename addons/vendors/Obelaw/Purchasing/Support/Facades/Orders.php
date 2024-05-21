<?php

namespace Obelaw\Purchasing\Support\Facades;

use Illuminate\Support\Facades\Facade;

class Orders extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'obelaw.purchases.orders';
    }
}
