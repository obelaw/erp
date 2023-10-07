<?php

namespace Obelaw\Accounting\Http\Livewire\COA;

use Obelaw\Accounting\Model\Account;
use Obelaw\Framework\Base\ViewBase;


class ShowComponent extends ViewBase
{
    public $account = null;
    public $viewId = 'obelaw_accounting_account_view';

    protected $pretitle = 'Accounts';
    protected $title = 'Account show';

    public function mount(Account $account)
    {
        $this->parameters(['account' => $account]);
    }
}
