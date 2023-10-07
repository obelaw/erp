<?php

namespace Obelaw\Accounting\Http\Livewire\Payments;

use Obelaw\Accounting\Model\Payment;
use Obelaw\Framework\Base\FromBase;

class CreatePaymentComponent extends FromBase
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
