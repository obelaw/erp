<?php

use Obelaw\Accounting\Filters\PaymentsGridFilter;
use Obelaw\Accounting\Model\Payment;
use Obelaw\Framework\Builder\Build\Grid\{
    CTA,
    Table,
    Bottom
};

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
        $bottom->setBottom('Create new payment', 'obelaw.accounting.payments.create');
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
        $CTA->setCall('Update', [
            'type' => 'route',
            'color' => 'info',
            'route' => 'obelaw.accounting.payments.update',
        ]);
    }
};
