<?php

use Obelaw\Accounting\Model\AccountEntry;
use Obelaw\Framework\Builder\Build\Common\RouteAction;
use Obelaw\Framework\Builder\Build\Grid\Bottom;
use Obelaw\Framework\Builder\Build\Grid\CTA;
use Obelaw\Framework\Builder\Build\Grid\Table;

return new class
{
    public function model()
    {
        return AccountEntry::class;
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom(
            label: 'Create New Entry',
            route: 'obelaw.accounting.entries.create',
            permission: 'accounting_entries_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Total', 'total')
            ->setColumn('Added on', 'added_on');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Show', new RouteAction(
            href: 'obelaw.accounting.entries.show',
            permission: 'accounting_entries_show',
        ));
    }
};
