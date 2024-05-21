<?php

use Obelaw\Accounting\Model\Bill;
use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;
use Obelaw\UI\Schema\Grid\Button\RouteAction;

return new class
{
    public $model = Bill::class;

    public function table(Table $table)
    {
        $table->setColumn('#', 'serial')
            ->setColumn('Vendor', 'vendor_id', 'vendorName')
            ->setColumn('Grand Total', 'grand_total');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Open', new RouteAction(
            color: 'info',
            href: 'obelaw.purchasing.bills.open',
            permission: 'sales_invoices_open',
        ));
    }
};
