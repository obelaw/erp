<?php

namespace Obelaw\Contacts\Livewire\Contacts;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('contacts_contacts_index')]
class IndexContactsComponent extends GridRender
{
    public $gridId = 'obelaw_helper_contacts_contacts_index';

    protected $pretitle = 'Contacts';
    protected $title = 'Contacts Listing';
}
