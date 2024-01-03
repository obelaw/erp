<?php

use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Sales\Models\SalesOrder;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = SalesOrder::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Sales Order',
            route: 'obelaw.sales.sales-order.create',
            permission: 'sales_sales_order_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Customer Name', 'customer_name')
            ->setColumn('Customer Phone', 'customer_phone')
            ->setColumn('Grand Total', 'grand_total');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Open', new RouteAction(
            color: 'info',
            href: 'obelaw.sales.sales-order.open',
            permission: 'sales_sales_order_open',
        ));
    }
};
