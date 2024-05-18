<?php

namespace Obelaw\Accounting\Livewire\Widgets;

use Livewire\Component;
use Obelaw\Sales\Models\Invoice;

class DraftInvoicesWidget extends Component
{
    public function render()
    {
        $invoices = Invoice::with(['order'])
            ->where('status', 'draft')
            ->get();

        return view('obelaw-accounting::widgets.draft-invoices', [
            'invoices' => $invoices,
        ]);
    }
}
