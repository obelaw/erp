<?php

use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;
use Obelaw\Warehouse\Models\Catagory;
use Obelaw\Schema\Grid\Button\RouteAction;

return new class
{
    public $model = Catagory::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'obelaw-warehouse::grids.name',
            route: 'obelaw.warehouse.products.categories.create',
            permission: 'warehouse_products_categories_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('obelaw-warehouse::grids.name', 'name');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.warehouse.products.categories.update',
            permission: 'warehouse_products_categories_update',
        ));
    }
};
