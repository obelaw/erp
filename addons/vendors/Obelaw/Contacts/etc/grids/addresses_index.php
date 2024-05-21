<?php

use Obelaw\Contacts\Models\Address;
use Obelaw\UI\Schema\Grid\Button;
use Obelaw\UI\Schema\Grid\Button\RouteAction;
use Obelaw\UI\Schema\Grid\CTA;
use Obelaw\UI\Schema\Grid\Table;

return new class
{
    public $model = Address::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Address',
            route: 'obelaw.contacts.addresses.create',
            permission: 'contacts_contacts_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('Label', 'label')
            ->setColumn('Country', 'country', 'showCountry')
            ->setColumn('City', 'city', 'showCity')
            ->setColumn('Street Line 1', 'street_line_1');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.contacts.addresses.update',
            permission: 'accounting_payments_update',
        ));
    }
};
