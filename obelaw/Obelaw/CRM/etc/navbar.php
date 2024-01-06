<?php

use Obelaw\Schema\Navbar\Links;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'home-2',
            label: 'Home',
            href: 'obelaw.crm.home',
        );

        $links->link(
            icon: 'users',
            label: 'Leads',
            href: 'obelaw.crm.leads.index',
        );
    }
};
