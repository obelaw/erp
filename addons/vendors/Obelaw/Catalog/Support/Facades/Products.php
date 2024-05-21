<?php

namespace Obelaw\Catalog\Support\Facades;

use Illuminate\Support\Facades\Facade;

class Products extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'obelaw.catalog.products';
    }
}
