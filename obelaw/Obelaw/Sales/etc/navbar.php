<?php

use Obelaw\UI\Schema\Navbar\Links;
use Obelaw\UI\Schema\Navbar\SubLinks;
use Obelaw\Facades\Bundles;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'dashboard',
            label: 'Dashboard',
            href: 'obelaw.sales.home',
            permission: 'accounting_vendors',
        );

        if (Bundles::hasModule('obelaw_catalog')) {
            $links->link(
                icon: 'barcode',
                label: 'Catalog',
                href: 'obelaw.catalog.home',
            );
        }

        $links->subLinks(
            id: 'sales_orders',
            icon: 'vendor/obelaw/icons/orders.svg',
            label: 'Orders',
            permission: 'sales_sales_order',
            links: function (SubLinks $links) {

                $links->link(
                    icon: 'vendor/obelaw/icons/orders.svg',
                    label: 'Sales Orders',
                    href: 'obelaw.sales.sales-order.index',
                    permission: 'sales_sales_order_index',
                );

                $links->link(
                    icon: 'vendor/obelaw/icons/invoice.svg',
                    label: 'Invoice',
                    href: 'obelaw.sales.invoices.index',
                    permission: 'sales_invoices',
                );

                $links->link(
                    icon: 'vendor/obelaw/icons/users.svg',
                    label: 'Customers',
                    href: 'obelaw.sales.customers.index',
                    permission: 'sales_customers',
                );
            },
        );

        $links->subLinks(
            id: 'sales_promotions',
            icon: 'discount-2',
            label: 'Promotions',
            permission: 'sales_promotions',
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
                    permission: 'sales_coupons_index',
                );
            },
        );

        $links->subLinks(
            id: 'sales_reporting',
            icon: 'file-analytics',
            label: 'Reporting',
            permission: 'sales_reporting',
            links: function (SubLinks $links) {
                $links->link(
                    icon: 'chart-bar',
                    label: 'Sales Analysis',
                    href: 'obelaw.sales.reporting.sales-analysis',
                    permission: 'sales_reporting_sales_analysis',
                );
            },
        );
    }
};
