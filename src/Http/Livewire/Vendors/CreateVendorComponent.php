<?php

namespace Obelaw\Accounting\Http\Livewire\Vendors;

use Obelaw\Accounting\Model\Vendor;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_vendors_create')]
class CreateVendorComponent extends FormRender
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
