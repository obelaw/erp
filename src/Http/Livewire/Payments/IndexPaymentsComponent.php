<?php

namespace Obelaw\Accounting\Http\Livewire\Payments;

use Obelaw\Framework\Base\GridBase;

class IndexPaymentsComponent extends GridBase
{
    public $gridId = 'obelaw_accounting_payments_index';

    protected $pretitle = 'Payments';
    protected $title = 'Payments listing';
}
