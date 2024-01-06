<?php

namespace Obelaw\Contacts\Livewire\Addresses;

use Obelaw\Contacts\Models\Address;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('contacts_contacts_create')]
class CreateAddressesComponent extends FormRender
{
    public $formId = 'obelaw_helper_contacts_addresses_form';

    protected $pretitle = 'Contacts';
    protected $title = 'Create new contact';

    public function submit()
    {
        $validateData = $this->validate();

        // dd($validateData);

        $validateData['is_main'] = null;

        Address::create($validateData);

        return $this->pushAlert('success', 'The address has been created');
    }
}
