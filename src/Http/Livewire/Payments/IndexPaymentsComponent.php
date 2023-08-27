<?php

namespace Obelaw\Accounting\Http\Livewire\Payments;

use Obelaw\Framework\Base\GridBase;
use Obelaw\Accounting\Views\Layout;

class IndexPaymentsComponent extends GridBase
{
    public $gridId = 'obelaw_accounting_payments_index';

    protected $pretitle = 'Payments';
    protected $title = 'Payments listing';

    public function layout()
    {
        return Layout::class;
    }
}
