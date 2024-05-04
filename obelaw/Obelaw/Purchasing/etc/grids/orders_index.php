<?php

use Obelaw\Purchasing\Models\PurchaseOrder;
use Obelaw\UI\Schema\Grid\Button;
use Obelaw\UI\Schema\Grid\Button\RouteAction;
use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;

return new class
{
    public $model = PurchaseOrder::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Order',
            route: 'obelaw.purchasing.po.create.draft',
            permission: 'accounting_vendors_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Vendor', 'vendor_id', 'vendorName')
            ->setColumn('Grand Total', 'grand_total');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Receive', new RouteAction(
            color: 'info',
            href: 'obelaw.purchasing.po.receive',
            permission: 'sales_invoices_open',
        ));

        $CTA->setCall('Mange', new RouteAction(
            color: 'info',
            href: 'obelaw.purchasing.po.create',
            permission: 'sales_invoices_open',
        ));

        $CTA->setCall('Open', new RouteAction(
            color: 'info',
            href: 'obelaw.purchasing.po.open',
            permission: 'sales_invoices_open',
        ));
    }
};
