<?php

namespace Obelaw\Accounting\Livewire\Configurations\PaymentMethods;

use Obelaw\Accounting\Model\PaymentMethod;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_configurations_payment_methods_create')]
class CreatePaymentMethodsComponent extends FormRender
{
    public $formId = 'obelaw_accounting_configurations_paymentmethods_form';

    protected $pretitle = 'Payment Methods';
    protected $title = 'Create new Payment Method';

    public function submit()
    {
        $inputs = $this->getInputs();

        $inputs['is_active'] = $inputs['is_active'] ?? false;

        PaymentMethod::create($inputs);
    }
}
