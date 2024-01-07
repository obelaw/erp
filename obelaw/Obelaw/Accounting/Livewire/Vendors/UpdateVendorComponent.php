<?php

namespace Obelaw\Accounting\Livewire\Vendors;

use Obelaw\Accounting\Model\Vendor;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_vendors_update')]
class UpdateVendorComponent extends FormRender
{
    protected $formId = 'obelaw_accounting_vendor_form';
    protected $pretitle = 'Vendor';
    protected $title = 'Create new vendor';

    public $vendor = null;

    public function mount(Vendor $vendor)
    {
        $this->vendor = $vendor;

        $this->setInputs([
            'type' => $this->vendor->type,
            'job_position' => $this->vendor->job_position,
            'image' => $this->vendor->image,
            'name' => $this->vendor->name,
            'phone' => $this->vendor->phone,
            'mobile' => $this->vendor->mobile,
            'email' => $this->vendor->email,
            'website' => $this->vendor->website,
        ]);
    }

    public function submit()
    {
        $this->vendor->update($this->getInputs());
    }
}
