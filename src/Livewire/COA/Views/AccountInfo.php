<?php

namespace Obelaw\Accounting\Livewire\COA\Views;

use Livewire\Component;

class AccountInfo extends Component
{
    public function mount($account)
    {
        $this->account = $account;
    }

    public function render()
    {
        return view('obelaw-accounting::coa.views.account-info', [
            'account' => $this->account
        ]);
    }
}
