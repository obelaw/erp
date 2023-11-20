<?php

namespace Obelaw\Accounting\Http\Livewire\Payments;

use Obelaw\Framework\ACL\Attributes\PermissionAccess;
use Obelaw\Framework\Base\GridBase;

#[PermissionAccess('accounting_payments_index')]
class IndexPaymentsComponent extends GridBase
{
    public $gridId = 'obelaw_accounting_payments_index';

    protected $pretitle = 'Payments';
    protected $title = 'Payments listing';
}
