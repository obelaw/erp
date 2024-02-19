<?php

namespace Obelaw\Accounting\Livewire\COA;

use Obelaw\Accounting\DTO\Account\GetAccountByIdDTO;
use Obelaw\Accounting\Facades\Accounts;
use Obelaw\Accounting\Model\Account;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Renderer\ViewRender;

#[Access('accounting_coa_show')]
class ShowComponent extends ViewRender
{
    use BootPermission;

    public $account = null;
    public $viewId = 'obelaw_accounting_account_view';

    protected $pretitle = 'Accounts';
    protected $title = 'Account show';

    public function mount(Account $account)
    {
        $this->parameters(['account' => Accounts::getById(new GetAccountByIdDTO($account->id))]);
    }
}
