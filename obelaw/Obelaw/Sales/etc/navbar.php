<?php

use Obelaw\Schema\Navbar\Links;
use Obelaw\Schema\Navbar\SubLinks;
use Obelaw\Facades\Bundles;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'dashboard',
            label: 'Dashboard',
            href: 'obelaw.sales.home',
        );

        if (Bundles::hasModule('obelaw_catalog')) {
            $links->link(
                icon: 'barcode',
                label: 'Catalog',
                href: 'obelaw.catalog.home',
            );
        }

        $links->link(
            icon: 'users',
            label: 'Customers',
            href: 'obelaw.sales.home',
        );

        $links->link(
            icon: 'shopping-cart',
            label: 'Sales Order',
            href: 'obelaw.sales.sales-order.index',
        );

        $links->link(
            icon: 'currency-dollar',
            label: 'Invoice',
            href: 'obelaw.sales.invoices.index',
        );

        $links->subLinks(
            id: 'sales_promotions',
            icon: 'discount-2',
            label: 'Promotions',
            links: function (SubLinks $links) {
                $links->link(
                    icon: 'discount',
                    label: 'Discounts',
                    href: 'obelaw.sales.home',
                );
                $links->link(
                    icon: 'ticket',
                    label: 'Coupon Codes',
                    href: 'obelaw.sales.coupons.index',
                );
            },
        );

        $links->subLinks(
            id: 'sales_reporting',
            icon: 'file-analytics',
            label: 'Reporting',
            links: function (SubLinks $links) {
                $links->link(
                    icon: 'chart-bar',
                    label: 'Sales Analysis',
                    href: 'obelaw.sales.home',
                );
            },
        );
    }
};
