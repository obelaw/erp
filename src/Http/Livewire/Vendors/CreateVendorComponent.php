<?php

namespace Obelaw\Accounting\Http\Livewire\Vendors;

use Obelaw\Accounting\Model\Vendor;
use Obelaw\Accounting\Views\Layout;
use Obelaw\Framework\Base\FromBase;

class CreateVendorComponent extends FromBase
{
    public $formId = 'obelaw_accounting_vendor_form';

    protected $pretitle = 'Vendor';
    protected $title = 'Create new vendor';

    public function layout()
    {
        return Layout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        Vendor::create($validateData);
    }
}
