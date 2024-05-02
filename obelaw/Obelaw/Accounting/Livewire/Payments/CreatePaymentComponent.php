<?php

namespace Obelaw\Accounting\Livewire\Payments;

use Obelaw\Accounting\Model\Payment;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_payments_create')]
class CreatePaymentComponent extends FormRender
{
    public $formId = 'obelaw_accounting_payment_form';

    protected $pretitle = 'Payments';
    protected $title = 'Create new Payment';

    public function submit()
    {
        Payment::create($this->getInputs());
    }
}
