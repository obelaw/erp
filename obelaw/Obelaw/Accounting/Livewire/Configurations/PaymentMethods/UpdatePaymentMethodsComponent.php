<?php

namespace Obelaw\Accounting\Livewire\Configurations\PaymentMethods;

use Obelaw\Accounting\Model\PaymentMethod;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_configurations_payment_methods_update')]
class UpdatePaymentMethodsComponent extends FormRender
{
    public $formId = 'obelaw_accounting_configurations_paymentmethods_form';

    public $method = null;

    protected $pretitle = 'Payment Methods';
    protected $title = 'Update This Payment Method';

    public function mount(PaymentMethod $method)
    {
        $this->method = $method;

        $this->setInputs([
            'journal_id' => $method->journal_id,
            'name' => $method->name,
            'is_active' => ($method->is_active) ? true : false,
        ]);
    }

    public function submit()
    {
        $this->method->update($this->getInputs());
    }
}
