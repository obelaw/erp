<?php

namespace Obelaw\Sales\Livewire\Invoices\Views;

use Livewire\Component;

class InvoiceStatementTab extends Component
{
    public function mount($invoice)
    {
        $this->invoice = $invoice;
    }

    public function render()
    {
        return view('obelaw-sales::invoice.statement',  [
            'items' => $this->invoice->entry?->amounts ?? null,
            'debitSum' => $this->invoice->entry?->amounts()->where('type', 'debit')->sum('amount'),
            'creditSum' => $this->invoice->entry?->amounts()->where('type', 'credit')->sum('amount'),
        ]);
    }
}
