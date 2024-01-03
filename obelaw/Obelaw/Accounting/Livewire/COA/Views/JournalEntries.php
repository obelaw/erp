<?php

namespace Obelaw\Accounting\Livewire\COA\Views;

use Livewire\Component;
use Livewire\WithPagination;
use Obelaw\Accounting\Model\AccountEntryAmount;

class JournalEntries extends Component
{
    use WithPagination;

    public $account;

    protected $paginationTheme = 'bootstrap';

    public function mount($account)
    {
        $this->account = $account;
    }

    public function render()
    {
        return view('obelaw-accounting::coa.views.journal-entries', [
            'entries' => AccountEntryAmount::with(['entry'])->where('account_id', $this->account->id)->paginate(100),
        ]);
    }
}
