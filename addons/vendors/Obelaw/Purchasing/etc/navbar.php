<?php

use Obelaw\UI\Schema\Navbar\Links;
use Obelaw\UI\Schema\Navbar\SubLinks;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'home-2',
            label: 'Dashboard',
            href: 'obelaw.purchasing.home',
            permission: 'purchasing_po',
        );

        $links->subLinks(
            id: 'purchasing_orders',
            icon: 'box-seam',
            label: 'Orders',
            permission: 'purchasing_po',
            links: function (SubLinks $links) {
                $links->link(
                    icon: 'box-seam',
                    label: 'Purchase Orders',
                    href: 'obelaw.purchasing.po.index',
                    permission: 'purchasing_po_index',
                );
                $links->link(
                    icon: 'box-seam',
                    label: 'Bills',
                    href: 'obelaw.purchasing.bills.index',
                    permission: 'purchasing_bills_index',
                );
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
