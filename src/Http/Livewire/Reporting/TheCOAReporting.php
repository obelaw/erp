<?php

namespace Obelaw\Accounting\Http\Livewire\Reporting;

use Livewire\Component;
use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Views\Layout;

class TheCOAReporting extends Component
{
    public function render()
    {
        return view('obelaw-accounting::reporting.coa', [
            'accounts_count' => Account::count(),
            'accounts' => Account::where('parent_account', null)->get(),
        ])->layout(Layout::class);
    }
}
