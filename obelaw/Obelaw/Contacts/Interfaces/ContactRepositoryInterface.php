<?php

namespace Obelaw\Contacts\Interfaces;

use Obelaw\Contacts\Contracts\CreateContact;

interface ContactRepositoryInterface 
{
    public function getAllContacts();
    public function getContactById($contactId);
    public function deleteContact($contactId);
    public function createContact(CreateContact $contactDetails);
    public function updateContact($contactId, array $newDetails);
}