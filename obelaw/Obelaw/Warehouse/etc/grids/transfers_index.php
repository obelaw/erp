<?php

use Obelaw\UI\Schema\Grid\Button;
use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;
use Obelaw\Warehouse\Models\Transfer;
use Obelaw\UI\Schema\Grid\Button\RouteAction;

return new class
{
    public $model = Transfer::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Transfer',
            route: 'obelaw.warehouse.transfer.create',
            permission: 'warehouse_transfer_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('Serial', 'serial')
            ->setColumn('From', 'inventoryFromName')
            ->setColumn('To', 'inventoryToName')
            ->setColumn('Type', 'type')
            ->setColumn('Status', 'status', 'status');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Show', new RouteAction(
            color: 'info',
            href: 'obelaw.warehouse.transfer.show',
            permission: 'warehouse_transfer_show',
        ));

        $CTA->setCall('Manage', new RouteAction(
            href: 'obelaw.warehouse.transfer.manage',
            permission: 'warehouse_transfer_show',
        ));
    }
};
