<?php

namespace Obelaw\Accounting\Http\Livewire\Vendors;

use Obelaw\Framework\ACL\Attributes\PermissionAccess;
use Obelaw\Framework\Base\GridBase;

#[PermissionAccess('accounting_vendors_index')]
class IndexVendorsComponent extends GridBase
{
    public $gridId = 'obelaw_accounting_vendors_index';

    protected $pretitle = 'Vendors';
    protected $title = 'Vendors listing';
}
