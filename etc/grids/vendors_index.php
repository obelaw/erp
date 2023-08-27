<?php

use Obelaw\Accounting\Model\Vendor;
use Obelaw\Framework\Builder\Build\Grid\{
    CTA,
    Table,
    Bottom
};

return new class
{
    public function model()
    {
        return Vendor::class;
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom('Create new vendor', 'obelaw.accounting.vendors.create');
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Name', 'name')
            ->setColumn('Type', 'type')
            ->setColumn('Mobile', 'mobile');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', [
            'type' => 'route',
            'color' => 'info',
            'route' => 'obelaw.accounting.vendors.update',
        ]);
    }
};
