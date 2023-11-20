<?php

namespace Obelaw\Accounting\Http\Livewire\Reporting;

use Livewire\Component;
use Obelaw\Accounting\Model\Account;
use Obelaw\Framework\ACL\Attributes\PermissionAccess;
use Obelaw\Framework\ACL\Traits\BootPermission;
use Obelaw\Framework\Views\Layout\DashboardLayout;

#[PermissionAccess('accounting_reporting_coa')]
class TheCOAReporting extends Component
{
    use BootPermission;

    public function render()
    {
        return view('obelaw-accounting::reporting.coa', [
            'accounts_count' => Account::count(),
            'accounts' => Account::where('parent_account', null)->get(),
        ])->layout(DashboardLayout::class);
    }
}
