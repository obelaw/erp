<?php

use Obelaw\Catalog\Models\Product;
use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = Product::class;

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
            ->setColumn('SKU', 'sku')
            ->setColumn('Type', 'product_type')
            ->setColumn('Catagory', 'catagory_name');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.catalog.products.update',
            permission: 'catalog_products_update',
        ));
    }
};
