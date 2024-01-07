<?php

namespace Obelaw\Accounting\Livewire\Entries;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('accounting_entries_index')]
class IndexEntriesComponent extends GridRender
{
    public $gridId = 'obelaw_accounting_entries_index';

    protected $pretitle = 'Entries';
    protected $title = 'Entries listing';
}
