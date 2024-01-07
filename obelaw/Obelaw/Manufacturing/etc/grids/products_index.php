<?php

use Obelaw\Catalog\Models\Product;
use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Manufacturing\Filters\ProductsGridFilter;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = Product::class;

    public $filter = ProductsGridFilter::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Product',
            route: 'obelaw.catalog.products.create',
            permission: 'catalog_products_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Reference', 'serial')
            ->setColumn('Name', 'name')
            ->setColumn('Cost Total', 'costTotal', 'costTotal');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.catalog.products.update',
            permission: 'catalog_products_update',
        ));

        $CTA->setCall('Variants', new RouteAction(
            color: 'info',
            href: 'obelaw.manufacturing.products.variants',
            permission: 'manufacturing_products_variants',
        ));
    }
};
