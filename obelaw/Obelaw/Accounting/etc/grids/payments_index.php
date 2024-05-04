<?php

use Obelaw\Accounting\Filters\PaymentsGridFilter;
use Obelaw\Accounting\Model\Payment;
use Obelaw\UI\Schema\Grid\Button;
use Obelaw\UI\Schema\Grid\Button\RouteAction;
use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;

return new class
{
    public $model = Payment::class;

    public $filter = PaymentsGridFilter::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Payment',
            route: 'obelaw.accounting.payments.create',
            permission: 'accounting_payments_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Type', 'type', 'type')
            ->setColumn('Vendor name', 'vendor_name')
            ->setColumn('Amount', 'amount', 'amount')
            ->setColumn('Due Date', 'due_date')
            ->setColumn('Remaining days', 'due_date', 'remainingDays')
            ->setColumn('Collected', 'collected', 'collected');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.accounting.payments.update',
            permission: 'accounting_payments_update',
        ));
    }
};
