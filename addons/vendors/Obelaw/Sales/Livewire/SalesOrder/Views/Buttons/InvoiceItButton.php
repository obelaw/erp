<?php

namespace Obelaw\Sales\Livewire\SalesOrder\Views\Buttons;

use Obelaw\Sales\Facades\SalesOrders;
use Obelaw\Sales\Models\SalesFlatOrder;
use Obelaw\Warehouse\Livewire\Inventories\Views\Buttons\ExportButton;

class InvoiceItButton extends ExportButton
{
    public SalesFlatOrder $order;

    protected $label = 'Invoice It';

    public function mount(SalesFlatOrder $order)
    {
        $this->order = $order;

        if ($order->invoice)
            $this->label = $order->invoice->serial;
    }

    public function click()
    {
        if ($this->order->invoice)
            return redirect()->route('obelaw.sales.invoices.open', [$this->order->invoice]);

        $invoice = SalesOrders::invoiceIt($this->order);

        $this->label = $invoice->serial;

        return $this->pushAlert('success', 'The Invoice has been created!');
    }
}
