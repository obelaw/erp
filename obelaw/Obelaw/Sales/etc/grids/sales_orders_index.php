<?php

use Obelaw\Sales\Models\SalesFlatOrder;
use Obelaw\Sales\Models\SalesOrder;
use Obelaw\UI\Schema\Grid\Button;
use Obelaw\UI\Schema\Grid\Button\RouteAction;
use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;

return new class
{
    public $model = SalesFlatOrder::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Sales Order',
            route: 'obelaw.sales.sales-order.draft.create',
            permission: 'sales_sales_order_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'serial')
            ->setColumn('Customer Name', 'customer_name')
            ->setColumn('Customer Phone', 'customer_phone')
            ->setColumn('Sub Total', 'sub_total')
            ->setColumn('Items', 'grand_total', 'showItems')
            ->setColumn('Sub Total', 'sub_total');
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
