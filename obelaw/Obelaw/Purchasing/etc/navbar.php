<?php

use Obelaw\Schema\Navbar\Links;
use Obelaw\Schema\Navbar\SubLinks;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'home-2',
            label: 'Dashboard',
            href: 'obelaw.purchasing.home',
            permission: 'purchasing_dashboard',
        );

        $links->subLinks(
            id: 'purchasing_orders',
            icon: 'box-seam',
            label: 'Orders',
            permission: 'purchasing_orders',
            links: function (SubLinks $links) {
                $links->link(
                    icon: 'box-seam',
                    label: 'Vendors',
                    href: 'obelaw.purchasing.vendors.index',
                    permission: 'purchasing_vendors_index',
                );
            },
        );
    }
};
