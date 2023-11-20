<?php

use Obelaw\Accounting\Filters\PaymentsGridFilter;
use Obelaw\Accounting\Model\Payment;
use Obelaw\Framework\Builder\Build\Grid\{
    CTA,
    Table,
    Bottom
};
use Obelaw\Framework\Builder\Build\Common\RouteAction;

return new class
{
    public function model()
    {
        return Payment::class;
    }

    public function filter()
    {
        return PaymentsGridFilter::class;
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom(
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
