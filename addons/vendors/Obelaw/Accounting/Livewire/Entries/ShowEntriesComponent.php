<?php

namespace Obelaw\Accounting\Livewire\Entries;

use Obelaw\Accounting\Model\AccountEntry;
use Obelaw\UI\Renderer\ViewRender;

#[Access('accounting_entries_show')]
class ShowEntriesComponent extends ViewRender
{
    public $entry = null;
    public $viewId = 'obelaw_accounting_entry_view';

    protected $pretitle = 'Entries';
    protected $title = 'Entry show';

    public function mount(AccountEntry $entry)
    {
        $this->parameters(['entry' => $entry]);
    }
}
