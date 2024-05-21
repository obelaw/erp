<?php

use Obelaw\Accounting\Model\PaymentMethod;
use Obelaw\UI\Schema\Grid\Button;
use Obelaw\UI\Schema\Grid\Button\RouteAction;
use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;

return new class
{
    public $model = PaymentMethod::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create Payment Method',
            route: 'obelaw.accounting.configurations.payment-methods.create',
            permission: 'accounting_configurations_payment_methods_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('journal Account', 'journal_tag')
            ->setColumn('Payment Name', 'name')
            ->setColumn('Payment Active', 'active');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.accounting.configurations.payment-methods.update',
            permission: 'accounting_configurations_payment_methods_update',
        ));
    }
};
