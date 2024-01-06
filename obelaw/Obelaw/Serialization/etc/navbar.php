<?php

use Obelaw\Schema\Navbar\Links;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'dashboard',
            label: 'Dashboard',
            href: 'obelaw.serialization.home',
        );
    }
};
