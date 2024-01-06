<?php

namespace Obelaw\Contacts\Livewire\Contacts;

use Obelaw\Contacts\Exceptions\JobPositionIsEmpty;
use Obelaw\Contacts\Facades\Contacts;
use Obelaw\Contacts\Utils\CreateCompanyContact;
use Obelaw\Contacts\Utils\CreateCustomerContact;
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
        $validateData = $this->validate();

        if ($validateData['type'] == 1) {
            try {
                Contacts::createContact(new CreateCustomerContact(
                    jobPosition: $validateData['job_position'],
                    name: $validateData['name'],
                    mobile: $validateData['mobile'],
                    email: $validateData['email'],
                    website: $validateData['website'],
                ));
            } catch (JobPositionIsEmpty $e) {
                return $this->addError('job_position', $e->getMessage());
            }
        }

        if ($validateData['type'] == 2) {
            Contacts::createContact(new CreateCompanyContact(
                name: $validateData['name'],
                mobile: $validateData['mobile'],
                email: $validateData['email'],
                website: $validateData['website'],
            ));
        }

        return $this->pushAlert('success', 'The contact has been created');
    }
}
