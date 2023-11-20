<?php

namespace Obelaw\Accounting\Http\Livewire\COA;

use Livewire\Component;
use Obelaw\Accounting\Model\Account;
use Obelaw\Framework\ACL\Attributes\PermissionAccess;
use Obelaw\Framework\ACL\Traits\BootPermission;
use Obelaw\Framework\Views\Layout\DashboardLayout;

#[PermissionAccess('accounting_coa_index')]
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
