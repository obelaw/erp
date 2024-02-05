<?php

namespace Obelaw\Accounting\Livewire\Configurations\PaymentMethods;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('accounting_configurations_payment_methods')]
class IndexPaymentMethodsComponent extends GridRender
{
    public $gridId = 'obelaw_accounting_configurations_paymentmethods';

    protected $pretitle = 'configurations';
    protected $title = 'Payment Methods';
}
