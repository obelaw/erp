<?php

namespace Obelaw\Accounting\Http\Livewire\COA;

use Livewire\Component;
use Obelaw\Accounting\Model\Account;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('accounting_coa_index')]
class IndexComponent extends Component
{
    use BootPermission;

    public function render()
    {
        return view('obelaw-accounting::coa.index', [
            'accounts' => Account::whereNull('parent_account')->orderBy('type')->get(),
        ])->layout(DashboardLayout::class);
    }
}
