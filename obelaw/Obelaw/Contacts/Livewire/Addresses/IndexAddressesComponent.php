<?php

namespace Obelaw\Contacts\Livewire\Addresses;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('contacts_contacts_index')]
class IndexAddressesComponent extends GridRender
{
    public $gridId = 'obelaw_helper_contacts_addresses_index';

    protected $pretitle = 'Addresses';
    protected $title = 'Addresses Listing';

    public function showCountry($value)
    {
        return $value->name;
    }

    public function showCity($value)
    {
        return $value->name;
    }
}
