<?php

use Obelaw\Schema\Navbar\Links;
use Obelaw\Schema\Navbar\SubLinks;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'dashboard',
            label: 'Dashboard',
            href: 'obelaw.catalog.home',
        );

        $links->link(
            icon: 'tags',
            label: 'Categories',
            href: 'obelaw.catalog.categories.index',
        );

        $links->subLinks(
            id: 'catalog_products',
            icon: 'box-seam',
            label: 'Products',
            links: function (SubLinks $links) {
                $links->link(
                    icon: 'brand-producthunt',
                    label: 'Products',
                    href: 'obelaw.catalog.products.index',
                );
                $links->link(
                    icon: 'components',
                    label: 'Product Variants',
                    href: 'obelaw.catalog.variants.index',
                );
            },
        );
    }
};
