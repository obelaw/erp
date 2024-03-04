<?php

use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;
use Obelaw\Warehouse\Models\Place\Warehouse;
use Obelaw\Schema\Grid\Button\RouteAction;

return new class
{
    public $model = Warehouse::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Warehouse',
            route: 'obelaw.warehouse.warehouses.create',
            permission: 'warehouse_warehouses_create',
        )->setButton(
            label: 'Create New Inventory',
            route: 'obelaw.warehouse.inventories.create',
            permission: 'warehouse_inventories_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Name', 'name')
            ->setColumn('Code', 'code');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Show', new RouteAction(
            color: 'info',
            href: 'obelaw.warehouse.warehouses.show',
            permission: 'warehouse_warehouses_show',
        ));

        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.warehouse.warehouses.update',
            permission: 'warehouse_warehouses_update',
        ));
    }
};
