<?php

use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;
use Obelaw\Sales\Models\Invoice;
use Obelaw\UI\Schema\Grid\Button\RouteAction;

return new class
{
    public $model = Invoice::class;

    public function table(Table $table)
    {
        $table->setColumn('#', 'serial');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Open', new RouteAction(
            color: 'info',
            href: 'obelaw.sales.invoices.open',
            permission: 'sales_invoices_open',
        ));
    }
};