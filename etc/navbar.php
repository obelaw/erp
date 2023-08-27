<?php

use Obelaw\Framework\Builder\Build\Navbar\Links;
use Obelaw\Framework\Builder\Build\Navbar\SubLinks;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'home-2',
            label: 'Home',
            href: 'obelaw.accounting.home',
        );
        $links->link(
            icon: 'chart-bar',
            label: 'Chart Of Accounts',
            href: 'obelaw.accounting.coa.index',
        );
        $links->link(
            icon: 'list',
            label: 'Entries',
            href: 'obelaw.accounting.entries.index',
        );
        $links->link(
            icon: 'receipt-2',
            label: 'Price List',
            href: 'obelaw.accounting.price_list.index',
        );
        $links->subLinks(
            id: 'accounting_vendors',
            icon: 'box-seam',
            label: 'Vendors',
            links: function (SubLinks $links) {
                $links->link(
                    icon: 'box-seam',
                    label: 'Vendors',
                    href: 'obelaw.accounting.vendors.index',
                );
            },
        );
    }
};
