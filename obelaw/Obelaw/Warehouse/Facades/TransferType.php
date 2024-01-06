<?php

namespace Obelaw\Warehouse\Facades;

use Illuminate\Support\Facades\Facade;

class TransferType extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'obelaw.warehouse.transfertypemanagement';
    }
}
