<?php

namespace Obelaw\Manufacturing\Facades;

use Illuminate\Support\Facades\Facade;

class Orders extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'manufacturing.service.product';
    }
}
