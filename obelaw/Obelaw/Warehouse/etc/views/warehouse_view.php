<?php

use Obelaw\Schema\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Warehouse info', 'obelaw-warehouses-warehouses-view-warehouse-info');
        $tab->addTab('Inventories list', 'obelaw-warehouses-warehouses-view-inventories-list');
    }
};
