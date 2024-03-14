<?php

namespace Obelaw\Warehouse\Livewire\Inventories\Views\Buttons;

use Obelaw\Warehouse\Livewire\Inventories\Views\Buttons\BarcodesExport;
use Obelaw\Warehouse\Livewire\Inventories\Views\Buttons\ExportButton;
use Obelaw\Warehouse\Models\Place\Inventory;

class ExportBarcodes extends ExportButton
{
    public Inventory $inventory;

    protected $label = 'Export Barcodes';

    public function mount(Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    public function click()
    {
        if ($this->inventory->items->isEmpty()) {
            return $this->pushAlert('warning', 'This inventory does not have items');
        }

        return \Excel::download(new BarcodesExport($this->inventory->items), 'invoices.xlsx');
    }
}
