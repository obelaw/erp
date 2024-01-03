<?php

namespace Obelaw\Accounting\Http\Livewire\Payments;

use Obelaw\Accounting\Model\Payment;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_payments_create')]
class CreatePaymentComponent extends FormRender
{
    public $formId = 'obelaw_accounting_payment_form';

    protected $pretitle = 'Payments';
    protected $title = 'Create new Payment';

    public function submit()
    {
        $validateData = $this->validate();

        Payment::create($validateData);
    }
}
