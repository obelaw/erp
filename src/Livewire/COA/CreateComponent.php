<?php

namespace Obelaw\Accounting\Livewire\COA;

use Obelaw\Accounting\DTO\Account\CreateAccountDTO;
use Obelaw\Accounting\DTO\Account\GetAccountByIdDTO;
use Obelaw\Accounting\Facades\Accounts;
use Obelaw\Framework\Contracts\HasDoSubmit;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_coa_create')]
class CreateComponent extends FormRender implements HasDoSubmit
{
    public $formId = 'obelaw_accounting_account_form';

    protected $pretitle = 'COA';
    protected $title = 'Create new account';

    public function doSubmit($validateData)
    {
        if ($parentId = $this->parent_account) {
            $parentAccount = Accounts::getById(new GetAccountByIdDTO($parentId));

            if ($parentAccount->type != $this->type) {
                return $this->pushAlert('error', 'It is not possible to choose a different account type than the parent account');
            }
        }

        $account = Accounts::create(new CreateAccountDTO(
            $validateData['parent_account'],
            $validateData['name'],
            $validateData['code'],
            $validateData['type'],
        ));

        if ($account) {
            return $this->pushAlert('success', 'The account has been created');
        }
    }
}
