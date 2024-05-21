<?php

namespace Obelaw\Accounting\Livewire\COA;

use Livewire\Component;
use Obelaw\Accounting\Facades\Accounts;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('accounting_coa_index')]
class IndexComponent extends Component
{
    use BootPermission;

    public function render()
    {
        return view('obelaw-accounting::coa.index', [
            'accounts' => Accounts::getParentOnly(),
        ])->layout(DashboardLayout::class);
    }
}
