<?php

use Obelaw\Schema\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Inventory info', 'obelaw-warehouses-inventories-view-inventory-info');
        // $tab->addTab('Products list', 'obelaw-warehouses-inventories-view-inventory-products');
        $tab->addTab('Serial numbers', 'obelaw-warehouses-inventories-view-inventory-serialnumbers');
    }
};
