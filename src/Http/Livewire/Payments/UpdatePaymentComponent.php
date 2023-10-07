<?php

namespace Obelaw\Accounting\Http\Livewire\Payments;

use Obelaw\Accounting\Model\Payment;
use Obelaw\Framework\Base\FromBase;

class UpdatePaymentComponent extends FromBase
{
    public $formId = 'obelaw_accounting_payment_form';

    protected $pretitle = 'Payments';
    protected $title = 'Create new Payment';

    public function mount(Payment $payment)
    {
        $this->payment = $payment;

        $this->type = $this->payment->type;
        $this->vendor_id = $this->payment->vendor_id;
        $this->payment_method_id = $this->payment->payment_method_id;
        $this->amount = $this->payment->amount;
        $this->notes = $this->payment->notes;
        $this->due_date = $this->payment->due_date;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $this->payment->update($validateData);
    }
}
