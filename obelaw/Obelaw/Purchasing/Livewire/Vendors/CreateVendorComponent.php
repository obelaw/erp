<?php

namespace Obelaw\Purchasing\Livewire\Vendors;

use Obelaw\Purchasing\Models\Vendor;
use Obelaw\Contacts\Enums\ContactType;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('purchasing_vendors_create')]
class CreateVendorComponent extends FormRender
{
    protected $formId = 'obelaw_purchasing_vendor_form';
    protected $pretitle = 'Vendor';
    protected $title = 'Create new vendor';

    public function submit()
    {
        $inputs = $this->getInputs();
        $inputs['document_type'] = ContactType::vendor;

        $vendor = Vendor::create($inputs);

        if (!$vendor->journal) {
            $vendor->journal()->create([
                'account_receivable' => $inputs['account_receivable'],
                'account_payable' => $inputs['account_payable'],
            ]);
        }

        $this->pushAlert('success', 'The vendor has been created');
    }
}
