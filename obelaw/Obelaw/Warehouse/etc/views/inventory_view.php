<?php

use Obelaw\Schema\View\Button;
use Obelaw\Schema\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Inventory info', 'obelaw-warehouses-inventories-view-inventory-info');
        $tab->addTab('Serial numbers', 'obelaw-warehouses-inventories-view-inventory-serialnumbers');
    }

    public function magicButtons(Button $button)
    {
        $button->setButton('obelaw-warehouses-inventories-view-btn-export-barcodes');
    }
};
