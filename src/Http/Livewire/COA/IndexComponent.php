<?php

namespace Obelaw\Accounting\Http\Livewire\COA;

use Livewire\Component;
use Obelaw\Accounting\Model\Account;
use Obelaw\Framework\Views\Layout\DashboardLayout;

class IndexComponent extends Component
{
    public function render()
    {
        return view('obelaw-accounting::coa.index', [
            'accounts' => Account::whereNull('parent_account')->orderBy('type')->get(),
        ])->layout(DashboardLayout::class);
    }
}
