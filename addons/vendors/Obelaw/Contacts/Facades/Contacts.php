<?php

namespace Obelaw\Contacts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Obelaw\Contacts\Models\Contact getAllContacts()
 * Get all Contacts
 * 
 * @method static \Obelaw\Contacts\Models\Contact getContactById($contactId)
 * @method static \Obelaw\Contacts\Models\Contact deleteContact($contactId)
 * @method static \Obelaw\Contacts\Models\Contact createContact(array $contactDetails)
 * @method static \Obelaw\Contacts\Models\Contact updateContact($contactId, array $newDetails)
 *
 * @see \Obelaw\Contacts\Repositories\ContactRepository
 */
class Contacts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'obelaw.contacts';
    }
}
