<?php

namespace Obelaw\Contacts\Repositories;

use Obelaw\Contacts\DTOs\CreateContact;
use Obelaw\Contacts\Interfaces\ContactRepositoryInterface;
use Obelaw\Contacts\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    public function getAllContacts()
    {
        return Contact::all();
    }

    public function getContactById($contactId)
    {
        return Contact::findOrFail($contactId);
    }

    public function deleteContact($contactId)
    {
        Contact::destroy($contactId);
    }

    public function createContact(CreateContact $createContact)
    {
        // dd($contactDetails->getData());
        return Contact::create($createContact->getData());
    }

    public function updateContact($contactId, array $newDetails)
    {
        return Contact::whereId($contactId)->update($newDetails);
    }
}
