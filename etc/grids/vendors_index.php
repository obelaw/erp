<?php

use Obelaw\Accounting\Model\Vendor;
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
        return Vendor::class;
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom(
            label: 'Create New Vendor',
            route: 'obelaw.accounting.vendors.create',
            permission: 'accounting_vendors_create',
        );
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
        $CTA->setCall('Show', new RouteAction(
            href: 'obelaw.accounting.vendors.show',
            permission: 'accounting_vendors_show',
        ));

        $CTA->setCall('Update', new RouteAction(
            color: 'info',
            href: 'obelaw.accounting.vendors.update',
            permission: 'accounting_vendors_update',
        ));
    }
};
