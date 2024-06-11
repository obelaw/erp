<?php

namespace Obelaw\Sales\Livewire\Invoices\Views\Buttons;

use Obelaw\Sales\Facades\SalesOrders;
use Obelaw\Sales\Models\Invoice;
use Obelaw\Warehouse\Livewire\Inventories\Views\Buttons\ExportButton;

class InvoicePostButton extends ExportButton
{
    public Invoice $invoice;

    protected $label = 'Post Invoice';

    public function mount(Invoice $invoice)
    {
        $this->invoice = $invoice;

        if ($invoice->entry)
            $this->label = 'Journal Entry #' . $invoice->entry->id;
    }

    public function click()
    {
        if ($this->invoice->entry)
            return redirect()->route('obelaw.accounting.entries.show', [$this->invoice->entry]);

        SalesOrders::postInvoice($this->invoice, o_config()->get('obelaw.erp.sales.customers.default.account.productSales'));

        return $this->pushAlert('success', 'The Invoice has been posted!');
    }
}
