<?php

namespace Obelaw\Accounting\Http\Livewire\COA;

use Obelaw\Accounting\Model\Account;
use Obelaw\Framework\ACL\Attributes\PermissionAccess;
use Obelaw\Framework\ACL\Traits\BootPermission;
use Obelaw\Framework\Base\ViewBase;

#[PermissionAccess('accounting_coa_show')]
class ShowComponent extends ViewBase
{
    use BootPermission;

    public $account = null;
    public $viewId = 'obelaw_accounting_account_view';

    protected $pretitle = 'Accounts';
    protected $title = 'Account show';

    public function mount(Account $account)
    {
        $this->parameters(['account' => $account]);
    }
}
