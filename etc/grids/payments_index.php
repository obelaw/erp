<?php

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

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom('Create new payment', 'obelaw.accounting.payments.create');
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Type', 'type')
            ->setColumn('Vendor name', 'vendor_name')
            ->setColumn('Amount', 'amount')
            ->setColumn('Due Date', 'due_date');
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
