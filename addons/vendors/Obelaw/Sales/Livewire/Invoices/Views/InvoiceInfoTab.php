<?php

namespace Obelaw\Sales\Livewire\Invoices\Views;

use Livewire\Component;

class InvoiceInfoTab extends Component
{
    public function mount($invoice)
    {
        $this->invoice = $invoice;
    }

    public function render()
    {
        return view('obelaw-sales::invoice.open', [
            'invoice' => $this->invoice
        ]);
    }
}
