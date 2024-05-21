<?php

use Obelaw\Accounting\Model\AccountEntry;
use Obelaw\UI\Schema\Grid\Button;
use Obelaw\UI\Schema\Grid\Button\RouteAction;
use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;

return new class
{
    public $model = AccountEntry::class;

    public function createButton(Button $button)
    {
        $button->setButton(
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
