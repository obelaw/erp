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
            href: 'obelaw.manufacturing.home',
        );

        $links->subLinks(
            id: 'manufacturing_products',
            icon: 'box-seam',
            label: 'Products',
            links: function (SubLinks $links) {
                $links->link(
                    icon: 'box-seam',
                    label: 'Products',
                    href: 'obelaw.manufacturing.products.index',
                );
                $links->link(
                    icon: 'components',
                    label: 'Product Variants',
                    href: 'obelaw.catalog.variants.index',
                );
            },
        );

        $links->link(
            icon: 'timeline-event',
            label: 'Planning',
            href: 'obelaw.manufacturing.planning.index',
        );

        $links->link(
            icon: 'building-factory-2',
            label: 'Manufacturing Orders',
            href: 'obelaw.manufacturing.orders.index',
        );

        $links->link(
            icon: 'user-cog',
            label: 'Workers',
            href: 'obelaw.manufacturing.workers.index',
        );
    }
};
