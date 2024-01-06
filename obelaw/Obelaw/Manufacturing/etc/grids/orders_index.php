<?php

use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Manufacturing\Models\Order;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = Order::class;


    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Order',
            route: 'obelaw.manufacturing.orders.create',
            permission: 'manufacturing_orders_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Reference', 'serial')
            ->setColumn('Name', 'name')
            ->setColumn('Quantity', 'quantity')
            ->setColumn('Start At', 'start_at');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Detail', new RouteAction(
            color: 'info',
            href: 'obelaw.manufacturing.orders.detail',
            permission: 'manufacturing_orders_detail',
        ));
    }
};
