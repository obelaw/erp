<?php

namespace Obelaw\Contacts\Livewire\Contacts;

use Obelaw\Contacts\DTOs\CreateContact;
use Obelaw\Contacts\Facades\Contacts;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('contacts_contacts_create')]
class CreateContactComponent extends FormRender
{
    public $formId = 'obelaw_helper_contacts_contact_form';

    protected $pretitle = 'Contacts';
    protected $title = 'Create new contact';

    public function submit()
    {
        $validateData = $this->getInputs();

        Contacts::createContact(new CreateContact(
            document_type: 1,
            name: $validateData['name'],
            phone: $validateData['phone'],
            email: $validateData['email'] ?? null,
            website: $validateData['website'] ?? null,
        ));

        return $this->pushAlert('success', 'The contact has been created');
    }
}
