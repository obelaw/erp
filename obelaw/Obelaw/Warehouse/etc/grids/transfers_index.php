<?php

use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;
use Obelaw\Warehouse\Models\Transfer;
use Obelaw\Schema\Grid\Button\RouteAction;

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
        $table->setColumn('#', 'id')
            ->setColumn('From', 'inventoryFromName')
            ->setColumn('To', 'inventoryToName')
            ->setColumn('Type', 'type')
            ->setColumn('Product', 'productName')
            ->setColumn('Quantity ', 'quantity');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Show', new RouteAction(
            color: 'info',
            href: 'obelaw.warehouse.transfer.show',
            permission: 'warehouse_transfer_show',
        ));
    }
};
