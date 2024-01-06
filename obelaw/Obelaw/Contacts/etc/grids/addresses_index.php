<?php

use Obelaw\Contacts\Models\Address;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

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
            ->setColumn('Country Code', 'country_code')
            ->setColumn('Street Line 1', 'street_line_1');
    }

    public function CTA(CTA $CTA)
    {
        //
    }
};
