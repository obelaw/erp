<?php

use Obelaw\UI\Schema\Navbar\Links;

return new class
{
    public $module = 'obelaw_accounting';

    public function navbar(Links $links)
    {
        $links->pushLink(
            to: 'sub:accounting_vendors',
            icon: 'writing-sign',
            label: 'Vendors',
            href: 'obelaw.purchasing.vendors.index',
        );
    }
};
