<?php

namespace Obelaw\Accounting\Lib;

use Obelaw\Accounting\Lib\Entry\Partner;
use Obelaw\Accounting\Model\AccountEntry;

class Entry
{
    public function create($added_on, $description = null)
    {
        $entry = AccountEntry::create([
            'description' => $description,
            'added_on' => $added_on,
        ]);

        return new Partner($entry);
    }
}
