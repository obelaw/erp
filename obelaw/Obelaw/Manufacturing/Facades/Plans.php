<?php

namespace Obelaw\Manufacturing\Facades;

use Illuminate\Support\Facades\Facade;

class Plans extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'manufacturing.services.plan';
    }
}
