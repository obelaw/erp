<?php

use Obelaw\Contacts\Models\Contact;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = Contact::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Contact',
            route: 'obelaw.contacts.contacts.create',
            permission: 'contacts_contacts_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Name', 'name')
            ->setColumn('Phone', 'phone');
    }

    public function CTA(CTA $CTA)
    {
        //
    }
};
