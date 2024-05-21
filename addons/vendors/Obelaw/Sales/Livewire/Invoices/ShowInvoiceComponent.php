<?php

namespace Obelaw\Sales\Livewire\Invoices;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\Sales\Models\Invoice;
use Obelaw\UI\Renderer\ViewRender;

#[Access('sales_invoices_open')]
class ShowInvoiceComponent extends ViewRender
{
    use BootPermission;

    public $invoice = null;
    public $viewId = 'obelaw_sales_invoice_view';

    protected $pretitle = 'Invoice';
    protected $title = 'Invoice show';

    public function mount(Invoice $invoice)
    {
        $this->parameters(['invoice' => $invoice]);
    }
}
