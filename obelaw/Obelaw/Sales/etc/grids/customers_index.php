<?php

use Obelaw\Sales\Models\Customer;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = Customer::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Customer',
            route: 'obelaw.sales.customers.create',
            permission: 'sales_customers_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Name', 'name');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.sales.customers.update',
            permission: 'accounting_customer_update',
        ));
    }
};
