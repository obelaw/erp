<?php

use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;
use Obelaw\Warehouse\Models\Adjustment;
use Obelaw\Schema\Grid\Button\RouteAction;

return new class
{
    public $model = Adjustment::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Adjustment',
            route: 'obelaw.warehouse.adjustments.create',
            permission: 'warehouse_adjustments_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Inventory', 'place_id', 'inventory')
            ->setColumn('Product', 'productName')
            ->setColumn('Quantity', 'quantity');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Open', new RouteAction(
            color: 'info',
            href: 'obelaw.warehouse.adjustments.show',
            permission: 'warehouse_adjustments_show',
        ));
    }
};
