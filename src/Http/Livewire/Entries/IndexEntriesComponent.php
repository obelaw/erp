<?php

namespace Obelaw\Accounting\Http\Livewire\Entries;

use Livewire\Component;
use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Views\Layout;

class IndexEntriesComponent extends Component
{
    public function render()
    {
        return view('obelaw-accounting::entries.index', [
            'accounts' => Account::get(),
        ])->layout(Layout::class);
    }
}
