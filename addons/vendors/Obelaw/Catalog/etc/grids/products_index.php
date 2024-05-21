<?php

use Obelaw\Catalog\Models\Product;
use Obelaw\UI\Schema\Grid\Button\RouteAction;
use Obelaw\UI\Schema\Grid\Button;
use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;

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
            ->setColumn('Catagory', 'catagory_name')
            ->setColumn('Name', 'name')
            ->setColumn('SKU', 'sku')
            ->setColumn('Type', 'product_type')
            ->setColumn('Scope', 'product_scope')
            ->setColumn('Final Price Sales', 'final_price_sales', 'price')
            ->setColumn('Price Purchase', 'price_purchase', 'price');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.catalog.products.update',
            permission: 'catalog_products_update',
        ));
    }
};
