<?php

namespace Obelaw\Accounting\Http\Livewire\Vendors;

use Obelaw\Accounting\Model\Vendor;
use Obelaw\Framework\ACL\Attributes\PermissionAccess;
use Obelaw\Framework\Base\FromBase;

#[PermissionAccess('accounting_vendors_create')]
class CreateVendorComponent extends FromBase
{
    public $formId = 'obelaw_accounting_vendor_form';

    protected $pretitle = 'Vendor';
    protected $title = 'Create new vendor';

    public function submit()
    {
        $validateData = $this->validate();

        Vendor::create($validateData);
    }
}
