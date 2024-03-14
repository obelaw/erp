<?php

use Obelaw\Schema\Navbar\Links;
use Obelaw\Schema\Navbar\SubLinks;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'home-2',
            label: 'Home',
            href: 'obelaw.warehouse.home',
        );

        $links->link(
            icon: 'building-warehouse',
            label: 'Warehouses',
            href: 'obelaw.warehouse.warehouses.index',
        );
        $links->link(
            icon: 'forklift',
            label: 'Inventories',
            href: 'obelaw.warehouse.inventories.index',
        );

        $links->subLinks(
            id: 'warehouse_transfers',
            icon: 'file-analytics',
            label: 'Transfers',
            permission: 'accounting_reporting',
            links: function (SubLinks $links) {
                $links->link(
                    icon: 'transfer-in',
                    label: 'Transfers',
                    href: 'obelaw.warehouse.transfer.index',
                );
                $links->link(
                    icon: 'chart-bar',
                    label: 'Bundles',
                    href: 'obelaw.warehouse.transfer.bundles.index',
                );
            },
        );

        $links->link(
            icon: 'check',
            label: 'Adjustments',
            href: 'obelaw.warehouse.adjustments.index',
        );
        $links->link(
            icon: 'file-barcode',
            label: 'Serial numbers',
            href: 'obelaw.warehouse.serial-numbers.index',
        );

        // $links->subLinks(
        //     id: 'warehouse_catalog',
        //     icon: 'barcode',
        //     label: 'Catalog',
        //     links: function (SubLinks $links) {
        //         $links->link(
        //             icon: 'tags',
        //             label: 'Categories',
        //             href: 'obelaw.warehouse.products.categories.index',
        //         );
        //         $links->link(
        //             icon: 'brand-producthunt',
        //             label: 'Products',
        //             href: 'obelaw.warehouse.products.index',
        //         );
        //     },
        // );
    }
};
