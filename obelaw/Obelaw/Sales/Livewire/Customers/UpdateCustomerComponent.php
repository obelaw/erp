<?php

namespace Obelaw\Sales\Livewire\Customers;

use Obelaw\Sales\Models\Customer;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('accounting_vendors_update')]
class UpdateCustomerComponent extends FormRender
{
    protected $formId = 'obelaw_sales_customer_form';
    protected $pretitle = 'Customers';
    protected $title = 'Update this Customer';

    public $customer = null;

    public function mount(Customer $customer)
    {
        $this->customer = $customer;

        $this->setInputs([
            'image' => $this->customer->image,
            'name' => $this->customer->name,
            'phone' => $this->customer->phone,
            'email' => $this->customer->email,
            'website' => $this->customer->website,
            'account_receivable' => $this->customer->journal->account_receivable,
            'account_payable' => $this->customer->journal->account_payable,
        ]);
    }

    public function submit()
    {
        $inputs = $this->getInputs();

        $this->customer->update($inputs);

        if (!$this->customer->journal) {
            $this->customer->journal()->create([
                'account_receivable' => $inputs['account_receivable'],
                'account_payable' => $inputs['account_payable'],
            ]);
        } else {
            $this->customer->journal()->update([
                'account_receivable' => $inputs['account_receivable'],
                'account_payable' => $inputs['account_payable'],
            ]);
        }

        return $this->pushAlert('success', 'The customer has been updated');
    }
}
