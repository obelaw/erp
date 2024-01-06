<?php

use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;
use Obelaw\Warehouse\Models\Product;
use Obelaw\Schema\Grid\Button\RouteAction;

return new class
{
    public $model = Product::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Product',
            route: 'obelaw.warehouse.products.create',
            permission: 'warehouse_products_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('Name', 'name')
            ->setColumn('SKU', 'sku')
            ->setColumn('Type', 'type')
            ->setColumn('Catagory', 'catagory_name');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.warehouse.products.update',
            permission: 'warehouse_products_update',
        ));
    }
};
