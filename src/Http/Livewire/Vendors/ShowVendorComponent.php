<?php

namespace Obelaw\Accounting\Http\Livewire\Vendors;

use Obelaw\Accounting\Model\Vendor;
use Obelaw\Framework\ACL\Attributes\PermissionAccess;
use Obelaw\Framework\Base\ViewBase;

#[PermissionAccess('accounting_vendors_show')]
class ShowVendorComponent extends ViewBase
{
    public $vendor = null;
    public $viewId = 'obelaw_accounting_vendor_view';

    protected $pretitle = 'Vendor';
    protected $title = 'Vendor show';

    public function mount(Vendor $vendor)
    {
        $this->parameters(['vendor' => $vendor]);
    }
}
