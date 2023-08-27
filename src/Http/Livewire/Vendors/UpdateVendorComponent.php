<?php

namespace Obelaw\Accounting\Http\Livewire\Vendors;

use Obelaw\Accounting\Model\Vendor;
use Obelaw\Accounting\Views\Layout;
use Obelaw\Framework\Base\FromBase;

class UpdateVendorComponent extends FromBase
{
    public $formId = 'obelaw_accounting_vendor_form';

    protected $pretitle = 'Vendor';
    protected $title = 'Create new vendor';

    public function mount(Vendor $vendor)
    {
        $this->vendor = $vendor;

        $this->type = $this->vendor->type;
        $this->job_position = $this->vendor->job_position;
        $this->image = $this->vendor->image;
        $this->name = $this->vendor->name;
        $this->phone = $this->vendor->phone;
        $this->mobile = $this->vendor->mobile;
        $this->email = $this->vendor->email;
        $this->website = $this->vendor->website;
    }

    public function layout()
    {
        return Layout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $this->vendor->update($validateData);
    }
}
