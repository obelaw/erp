<?php

namespace Obelaw\Sales\Livewire\SalesOrder\Views\Buttons;

use Obelaw\Warehouse\Livewire\Inventories\Views\Buttons\ExportButton;

class PrintItButton extends ExportButton
{
    protected $label = 'Print It';

    public function click()
    {
        $this->js('window.print();');
    }
}
