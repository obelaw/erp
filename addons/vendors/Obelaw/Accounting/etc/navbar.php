<?php

use Obelaw\UI\Schema\Navbar\Links;
use Obelaw\UI\Schema\Navbar\SubLinks;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'home-2',
            label: 'Home',
            href: 'obelaw.accounting.home',
            permission: 'accounting_coa_index',
        );

        $links->link(
            icon: 'chart-bar',
            label: 'Chart Of Accounts',
            href: 'obelaw.accounting.coa.index',
            permission: 'accounting_coa_index',
        );

        $links->subLinks(
            id: 'accounting_vendors',
            icon: 'box-seam',
            label: 'Vendors',
            permission: 'accounting_vendors',
            links: function (SubLinks $links) {
                // $links->link(
                //     icon: 'box-seam',
                //     label: 'Vendors',
                //     href: 'obelaw.accounting.vendors.index',
                //     permission: 'accounting_vendors_index',
                // );
                $links->link(
                    icon: 'cash',
                    label: 'Payments',
                    href: 'obelaw.accounting.payments.index',
                    permission: 'accounting_payments_index',
                );
            },
        );

        $links->link(
            icon: 'list',
            label: 'Entries',
            href: 'obelaw.accounting.entries.index',
            permission: 'accounting_entries_index',
        );

        $links->link(
            icon: 'receipt-2',
            label: 'Price List',
            href: 'obelaw.accounting.price_list.index',
            permission: 'accounting_pricelist_index',
        );

        $links->subLinks(
            id: 'accounting_reporting',
            icon: 'file-analytics',
            label: 'Reporting',
            permission: 'accounting_reporting',
            links: function (SubLinks $links) {
                $links->link(
                    icon: 'chart-bar',
                    label: 'COA report',
                    href: 'obelaw.accounting.reporting.coa',
                    permission: 'accounting_reporting_coa',
                );
                $links->link(
                    icon: 'chart-bar',
                    label: 'General Ledger',
                    href: 'obelaw.accounting.reporting.gl',
                    permission: 'accounting_reporting_coa',
                );
            },
        );

        $links->subLinks(
            id: 'accounting_configurations',
            icon: 'vendor/obelaw/icons/accounting-configurations.svg',
            label: 'Configurations',
            permission: 'accounting_vendors',
            links: function (SubLinks $links) {
                $links->link(
                    icon: 'vendor/obelaw/icons/payment-methods.svg',
                    label: 'Payment Methods',
                    href: 'obelaw.accounting.configurations.payment-methods.index',
                    permission: 'accounting_configurations_payment_methods',
                );
            },
        );
    }
};
