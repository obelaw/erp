<?php

namespace Obelaw\Sales\Livewire\Customers;

use Obelaw\Contacts\Enums\ContactType;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Sales\Models\Customer;
use Obelaw\UI\Renderer\FormRender;

#[Access('sales_customers_create')]
class CreateCustomerComponent extends FormRender
{
    protected $formId = 'obelaw_sales_customer_form';
    protected $pretitle = 'Customers';
    protected $title = 'Create New Customers';

    public function submit()
    {
        $inputs = $this->getInputs();
        $inputs['document_type'] = ContactType::customer;

        $customer = Customer::create($inputs);

        if (isset($inputs['accounts']['receivable_id']) && isset($inputs['accounts']['payable_id'])) {
            $customer->journal()->create([
                'account_receivable' => $inputs['accounts']['receivable_id'] ?? null,
                'account_payable' => $inputs['accounts']['payable_id'] ?? null,
            ]);
        }

        return $this->pushAlert('success', 'The customer has been created');
    }
}
