<?php

namespace Obelaw\Contacts\Interfaces;

use Obelaw\Contacts\DTOs\CreateContact;


interface ContactRepositoryInterface 
{
    public function getAllContacts();
    public function getContactById($contactId);
    public function deleteContact($contactId);
    public function createContact(CreateContact $createContact);
    public function updateContact($contactId, array $newDetails);
}