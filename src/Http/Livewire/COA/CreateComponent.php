<?php

namespace Obelaw\Accounting\Http\Livewire\COA;

use Obelaw\Accounting\Model\Account;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Framework\Contracts\HasDoSubmit;

#[Access('accounting_coa_create')]
class CreateComponent extends FormRender implements HasDoSubmit
{
    public $formId = 'obelaw_accounting_account_form';

    protected $pretitle = 'COA';
    protected $title = 'Create new account';

    public function doSubmit($validateData)
    {
        if ($parentId = $this->parent_account) {
            $parentAccount = Account::find($parentId);

            if ($parentAccount->type != $this->type) {
                return $this->pushAlert('error', 'It is not possible to choose a different account type than the parent account');
            }
        }

        $account = Account::create($validateData);

        if ($account) {
            return $this->pushAlert('success', 'The account has been created');
        }
    }
}
