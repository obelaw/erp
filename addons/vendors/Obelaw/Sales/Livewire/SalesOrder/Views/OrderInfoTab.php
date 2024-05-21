<?php

namespace Obelaw\Sales\Livewire\SalesOrder\Views;

use Livewire\Component;

class OrderInfoTab extends Component
{
    public function mount($order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('obelaw-sales::salesorder.views.info', [
            'order' => $this->order
        ]);
    }
}
