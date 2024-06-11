<?php

namespace Obelaw\ERP\Facades;

use Illuminate\Support\Facades\Facade;

class Management extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'obelaw.erp.management';
    }
}
