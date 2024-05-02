<?php

namespace Obelaw\Sales\Livewire\Invoices;

use Livewire\Component;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;
use Obelaw\Sales\Facades\SalesOrders;
use Obelaw\Sales\Models\Invoice;

#[Access('sales_invoices_open')]
class OpenInvoicesComponent extends Component
{
    use BootPermission;

    public $invoice = null;

    public function mount(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function render()
    {
        return view('obelaw-sales::invoice.open')->layout(DashboardLayout::class);
    }

    public function invoiceIt()
    {
        $invoice = SalesOrders::invoiceIt($this->order->id);
    }
}
