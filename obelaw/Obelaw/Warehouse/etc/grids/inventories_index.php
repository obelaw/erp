<?php

use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;
use Obelaw\Warehouse\Models\Inventory;

return new class
{
    public $model = Inventory::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Inventory',
            route: 'obelaw.warehouse.inventories.create',
            permission: 'warehouse_inventories_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Reference', 'serial')
            ->setColumn('Name', 'name')
            ->setColumn('Code', 'code');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Show', new RouteAction(
            color: 'info',
            href: 'obelaw.warehouse.inventories.show',
            permission: 'warehouse_inventories_show',
        ));

        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.warehouse.inventories.update',
            permission: 'warehouse_inventories_update',
        ));
    }
};
