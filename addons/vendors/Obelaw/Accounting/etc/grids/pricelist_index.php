<?php

use Obelaw\Accounting\Model\PriceList;
use Obelaw\UI\Schema\Grid\Button;
use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;
use Obelaw\UI\Schema\Grid\Button\RouteAction;

return new class
{
    public $model = PriceList::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New List',
            route: 'obelaw.accounting.price_list.create',
            permission: 'accounting_price_list_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Name', 'name')
            ->setColumn('Code', 'code')
            ->setColumn('Start date', 'start_date')
            ->setColumn('End date', 'end_date');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Items', new RouteAction(
            color: 'info',
            href: 'obelaw.accounting.price_list.items',
            permission: 'accounting_price_list_items',
        ));

        $CTA->setCall('Update', new RouteAction(
            color: 'info',
            href: 'obelaw.accounting.price_list.update',
            permission: 'accounting_price_list_update',
        ));
    }
};
