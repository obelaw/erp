<?php

namespace Obelaw\Warehouse\Facades;

use Illuminate\Support\Facades\Facade;

class Warehouse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'obelaw.flow.warehouse.management';
    }
}
