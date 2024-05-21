<?php

namespace Obelaw\Accounting\DTO\Entry;

use Obelaw\Framework\Support\DTO;

class CreateEntryDTO extends DTO
{
    public function __construct(
        public string $added_on,
        public string|null $description,
    ) {
    }
}
