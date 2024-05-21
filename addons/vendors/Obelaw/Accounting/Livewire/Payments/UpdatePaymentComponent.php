<?php

namespace Obelaw\Accounting\Livewire\Payments;

use Obelaw\Accounting\Model\Payment;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_payments_update')]
class UpdatePaymentComponent extends FormRender
{
    public $payment = null;

    protected $formId = 'obelaw_accounting_payment_form';
    protected $pretitle = 'Payments';
    protected $title = 'Create new Payment';

    public function mount(Payment $payment)
    {
        $this->payment = $payment;

        $this->setInputs([
            'type' => $this->payment->type,
            'vendor_id' => $this->payment->vendor_id,
            'payment_method_id' => $this->payment->payment_method_id,
            'amount' => $this->payment->amount,
            'notes' => $this->payment->notes,
            'due_date' => $this->payment->due_date,
        ]);
    }

    public function submit()
    {
        $this->payment->update($this->getInputs());
    }
}
