<?php

namespace Obelaw\Contacts\Abstracts;

use Obelaw\Contacts\Contracts\CreateContact as ICreateContact;

abstract class CreateContact implements ICreateContact
{
    public function getData()
    {
        return (array) $this->data;
    }
}
