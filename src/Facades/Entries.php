<?php

namespace Obelaw\Accounting\Facades;

use Illuminate\Support\Facades\Facade;

class Entries extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'obelaw.accounting.entry';
    }
}
