<?php

namespace Obelaw\Warehouse\Facades;

use Illuminate\Support\Facades\Facade;

class Adjustments extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'obelaw.warehouse.adjustment';
    }
}
