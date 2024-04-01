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

        if (isset($inputs['account_receivable']) || isset($inputs['account_payable']))
            if (!$vendor->journal) {
                $vendor->journal()->create([
                    'account_receivable' => $inputs['account_receivable'] ?? null,
                    'account_payable' => $inputs['account_payable'] ?? null,
                ]);
            }

        $this->pushAlert('success', 'The vendor has been created');
    }
}
