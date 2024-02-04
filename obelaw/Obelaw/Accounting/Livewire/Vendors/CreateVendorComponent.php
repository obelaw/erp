<?php

namespace Obelaw\Accounting\Livewire\Vendors;

use Obelaw\Accounting\Model\Vendor;
use Obelaw\Contacts\Enums\ContactType;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_vendors_create')]
class CreateVendorComponent extends FormRender
{
    protected $formId = 'obelaw_accounting_vendor_form';
    protected $pretitle = 'Vendor';
    protected $title = 'Create new vendor';

    public function submit()
    {
        $inputs = $this->getInputs();
        $inputs['document_type'] = ContactType::vendor;

        Vendor::create($inputs);
    }
}
