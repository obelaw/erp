<?php

use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;
use Obelaw\Warehouse\Models\TransferBundle;

return new class
{
    public $model = TransferBundle::class;

    public function createButton(Button $button)
    {
        ///
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Status', 'status', 'status');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Show', new RouteAction(
            color: 'info',
            href: 'obelaw.warehouse.transfer.bundles.show',
            permission: 'warehouse_transfer_show',
        ));

        $CTA->setCall('Serials', new RouteAction(
            href: 'obelaw.warehouse.transfer.bundles.serials',
            permission: 'warehouse_transfer_show',
        ));
    }
};
