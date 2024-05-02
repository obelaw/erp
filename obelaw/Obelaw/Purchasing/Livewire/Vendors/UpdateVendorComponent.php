<?php

namespace Obelaw\Purchasing\Livewire\Vendors;

use Obelaw\Purchasing\Models\Vendor;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('purchasing_vendors_update')]
class UpdateVendorComponent extends FormRender
{
    protected $formId = 'obelaw_purchasing_vendor_form';
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
            'account_receivable' => $this->vendor->journal->account_receivable ?? null,
            'account_payable' => $this->vendor->journal->account_payable ?? null,
        ]);
    }

    protected function rules()
    {
        $rules = parent::rules();

        $rules['inputs.phone'] = 'required|unique:Obelaw\Purchasing\Models\Vendor,phone,' . $this->vendor->id;

        return $rules;
    }

    public function submit()
    {
        $inputs = $this->getInputs();

        $this->vendor->update($inputs);

        if (isset($inputs['account_receivable']) || isset($inputs['account_payable']))
            if (!$this->vendor->journal) {
                $this->vendor->journal()->create([
                    'account_receivable' => $inputs['account_receivable'] ?? null,
                    'account_payable' => $inputs['account_payable'] ?? null,
                ]);
            } else {
                $this->vendor->journal()->update([
                    'account_receivable' => $inputs['account_receivable'],
                    'account_payable' => $inputs['account_payable'],
                ]);
            }

        $this->pushAlert('success', 'The vendor has been updated');
    }
}
