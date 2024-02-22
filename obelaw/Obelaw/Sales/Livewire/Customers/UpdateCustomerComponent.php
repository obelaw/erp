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
            'accounts' => [
                'receivable_id' => $this->customer->journal->account_receivable,
                'payable_id' => $this->customer->journal->account_payable,
            ],

        ]);
    }

    public function submit()
    {
        $inputs = $this->getInputs();

        $this->customer->update($inputs);

        if (!$this->customer->journal) {
            $this->customer->journal()->create([
                'account_receivable' => $inputs['accounts']['receivable_id'],
                'account_payable' => $inputs['accounts']['payable_id'],
            ]);
        } else {
            $this->customer->journal()->update([
                'account_receivable' => $inputs['accounts']['receivable_id'],
                'account_payable' => $inputs['accounts']['payable_id'],
            ]);
        }

        return $this->pushAlert('success', 'The customer has been updated');
    }
}
