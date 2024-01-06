<?php

namespace Obelaw\CRM\Facades;

use Illuminate\Support\Facades\Facade;

class Leads extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'obelaw.crm.leads';
    }
}
