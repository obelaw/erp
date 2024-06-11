<?php

namespace Obelaw\Sales\Livewire\SalesOrder;

use Obelaw\ERP\Facades\Management;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('sales_sales_order_create')]
class CreateSalesOrderComponent extends FormRender
{
    public $formId = 'obelaw_sales_draft_salesorder_form';

    protected $pretitle = 'Sales Order';
    protected $title = 'Create New Sales Order';

    public function submit()
    {
        $inputs = $this->getInputs();

        $tempOrder = Management::sales()->tempSalesOrders()->createOrGetOrder($inputs['customer_id']);

        redirect()->route('obelaw.sales.sales-order.create', [$tempOrder]);

        // return $this->pushAlert('success', 'The contact has been created');
    }
}
