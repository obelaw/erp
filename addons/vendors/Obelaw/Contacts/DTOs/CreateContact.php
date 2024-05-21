<?php

namespace Obelaw\Contacts\DTOs;

use Obelaw\Contacts\Enums\ContactType;
use Obelaw\Framework\Support\DTO;

class CreateContact extends DTO
{
    public function __construct(
        public ContactType|int $document_type,
        public string $name,
        public string $phone,
        public string|null $image = null,
        public string|null $email = null,
        public string|null $website = null,
    ) {
    }
}
