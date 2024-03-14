<?php

namespace Obelaw\Warehouse\Livewire\Inventories\Views\Buttons;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BarcodesExport implements FromView
{
    public function __construct(public $items = null)
    {
    }

    public function view(): View
    {
        return view('obelaw-warehouse::serialnumbers.export', [
            'items' => $this->items
        ]);
    }
}
