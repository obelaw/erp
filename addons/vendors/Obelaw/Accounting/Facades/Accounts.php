<?php

namespace Obelaw\Accounting\Facades;

use Illuminate\Support\Facades\Facade;

class Accounts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'obelaw.accounting.account';
    }
}
